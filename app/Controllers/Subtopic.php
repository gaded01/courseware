<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Subtopic extends BaseController
{

  public function index($id)
  {
    $db = db_connect();
    $model = new CourseModel($db);

    $subtopic = $model->getSubtopic($id);
    $course = $model->find($id);

    $data = [
      'course' => $course,
      'subtopic' => $subtopic
    ];

    return view('pages/subtopic_list', $data);
  }

  public function insertSubtopic($id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $subtopic = $model->getSubtopic($id);
    $course = $model->find($id);
    $data = [
      'course' => $course,
      'subtopic' => $subtopic,
    ];

    helper(['form']);

    if ($this->request->getMethod() == 'post') {
      $rules = [
        'subtopic'  => [
          'label'   => 'Subtopic',
          'rules'   => 'required',
          'errors'  => [
            'required' => 'Field is required'
          ]
        ]
      ];
      if ($this->validate($rules)) {
        $model->addSubtopic([
          'course_id' => $this->request->getPost('id'),
          'sub_topic' => $this->request->getPost('subtopic'),
        ]);
        $subtopic = $model->getSubtopic($id);
        $course = $model->find($id);
        $data = [
          'course' => $course,
          'subtopic' => $subtopic,
          'success' => 'Subtopic added successfully'
        ];
      } else {
        $data['error'] = $this->validator;
      }
    }
    return view('pages/subtopic_list', $data);
  }

  public function deleteSubtopic($id, $subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $course = $model->find($id);

    $model->deleteSubtopic($subtopic_id);
    $subtopic = $model->getSubtopic($id);

    $data = [
      'course' => $course,
      'subtopic' => $subtopic,
      'delete' => 'Item deleted'
    ];

    return view('pages/subtopic_list', $data);
  }

  public function getSubtopic($id, $subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);

    $course = $model->find($id);
    $subtopic = $model->getSubtopic($id);
    $subtopic2 = $model->subtopic($subtopic_id);

    $data = [
      'course' => $course,
      'subtopic2' => $subtopic2,
      'subtopic' => $subtopic
    ];

    return view('pages/subtopic_list', $data);
  }

  public function updateSubtopic($id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $course = $model->find($id);


    if ($this->request->getMethod() == 'post') {
      $updatedData = ([
        'subtopic_id' => $this->request->getPost('subtopic_id'),
        'sub_topic' => $this->request->getPost('sub_topic')
      ]);

      $model->updateSubtopic($updatedData);
      $subtopic = $model->getSubtopic($id);
    }

    $data = [
      'course' => $course,
      'subtopic' => $subtopic,
      'update' => 'Updated Successfully'
    ];

    return view('pages/subtopic_list', $data);
  }

  public function searchSubtopic($id)
  {
    $db = db_connect();
    $model = new CourseModel($db);

    $inputData = [
      'input' => $this->request->getGet('subtopic')
    ];

    $course = $model->find($id);
    $subtopic = $model->getSubtopic($id);
    $result = $model->searchSubtopic($inputData);

    $data = [
      'course' => $course,
      'subtopic' => $subtopic,
      'result' => $result['dataResult'],
      'count' => $result['countResult']
    ];

    return view('pages/subtopic_list', $data);
  }


  public function contentView($subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);

    $subtopic = $model->subtopic($subtopic_id);
    $reference = $model->getReference($subtopic_id);
    $resources = $model->getResources($subtopic_id);
  
    $data = [
      'reference' => $reference,
      'subtopic' => $subtopic,
      'resources' => $resources
    ];

   
    return view('pages/content', $data);
  }


  public function contentEdit($subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);

    $reference = $model->getReference($subtopic_id);
    $subtopic = $model->subtopic($subtopic_id);
    $resources = $model->getResources($subtopic_id);
    $data = [
      'subtopic' => $subtopic,
      'reference' => $reference,
      'resources' => $resources
    ];
    return view('pages/content_update', $data);
  }

  public function contentUpdate($subtopic_id)
  {

    $db = db_connect();
    $model = new CourseModel($db);

    if ($this->request->getMethod() == 'post') {
      $updatedData = [
        'content' => $this->request->getPost('content'),
        'subtopic_id' => $subtopic_id,
      ];
      $model->updateContent($updatedData);
    }
    $resources = $model->getResources($subtopic_id);
    $subtopic =  $model->subtopic($subtopic_id);
    $reference = $model->getReference($subtopic_id);
    $data = [
      'subtopic' => $subtopic,
      'reference' => $reference,
      'resources' => $resources,
      'updateContentMessage' => 'Content updated successfully'
    ];

    return view('pages/content', $data);
  }

  public function insertReference($subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $subtopic = $model->subtopic($subtopic_id);
    $reference = $model->getReference($subtopic_id);
    $resources = $model->getResources($subtopic_id);
  

    helper(['form']);

    if ($this->request->getMethod() == 'post') {
      $rules = [
        'reference' => [
          'label' => 'Reference',
          'rules' => 'required|min_length[5]',
        ],
      ];
      if ($this->validate($rules)) {
        $model->addReference([
          'reference' => $this->request->getPost('reference'),
          'subtopic_id' => $this->request->getPost('subtopic_id')
        ]);
        $reference = $model->getReference($subtopic_id);

        $data = [
          'subtopic' => $subtopic,
          'resources' => $resources,
          'reference' => $reference,
          'successReference' => 'New reference been added.'
        ];
      } else {
        $data = [
          'subtopic' => $subtopic,
          'resources' => $resources,
          'reference' => $reference,
          'errorReference' => $this->validator,
        ]; 
      }
    }
    
    return view('pages/content_update', $data);
  }

  public function deleteReference($reference_id, $subtopic_id)
  {
    
    $db = db_connect();
    $model = new CourseModel($db);
    $model->deleteReference($reference_id);

    $reference = $model->getReference($subtopic_id);
    $subtopic = $model->subtopic($subtopic_id);
    $resources = $model->getResources($subtopic_id);
    
    

    $data = [
      'subtopic' => $subtopic,
      'reference' => $reference,
      'resources' => $resources,
      'deleteReference' => 'Reference deleted.'
    ];

    return view('pages/content_update', $data);
  }

  public function editReference($reference_id, $subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $editReference  = $model->reference($reference_id);
    $reference = $model->getReference($subtopic_id);
    $subtopic = $model->subtopic($subtopic_id);
    $resources = $model->getResources($subtopic_id);
    $data = [
      'editReference' => $editReference,
      'subtopic' => $subtopic,
      'reference' => $reference,
      'resources' => $resources
    ];
    return view('pages/content_update', $data);
  }

  public function updateReference($reference_id, $subtopic_id)
  {
    $db = db_connect();
    $model = new CourseModel($db);
    $subtopic = $model->subtopic($subtopic_id);
    $resources = $model->getResources($subtopic_id);


    if ($this->request->getMethod() == 'post') {
      $updatedData = [
        'reference_id' => $reference_id,
        'reference' => $this->request->getPost('reference')
      ];
      $model->updateReference($updatedData);
      $reference = $model->getReference($subtopic_id);
      
      $data = [
        'subtopic' => $subtopic,
        'reference' => $reference,
        'resources' => $resources,
        'updateReference' => 'Reference updated successfully.'
      ];
    }
    return view('pages/content_update', $data);
  }
}

