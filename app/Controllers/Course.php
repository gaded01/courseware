<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Course extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new CourseModel($db);
		$course = $model->getCourseData();

		$data = [
			'course' => $course
		];
		return view('pages/course_list', $data);
	}

	public function newCourse()
	{
		$db = db_connect();
		$model = new CourseModel($db);
	
		$course = $model->getCourseData();

		$data = [
			'course' => $course
		];

		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'topic' => [
					'label' => 'Topic',
					'rules' => 'required',
					'errors' => [
						'required' => 'Field value required',
					]
				],
				'description' =>	[
					'label' => 'Description',
					'rules' => 'required|min_length[5]',
					'errors' => [
						'required' => 'Field value required',
						'min_length' => 'Description is to short'
					]
				]
			];
			if ($this->validate($rules)) {
				$model->insertCourse([
					'topic' =>  $this->request->getPost('topic'),
					'description' => $this->request->getPost('description'),
				]);
				$course = $model->getCourseData();
				$data = [
					'course' => $course,
					'success' => "New topic added succesfully"
				];
		
			} else {
				$data['error'] = $this->validator;
			}	
		}
		return view('pages/course_list', $data);
	}


	function removeCourse($id)
	{
		$db = db_connect();
		$model = new CourseModel($db);

		$model->deleteData($id);
		$course = $model->getCourseData();

		$data = [
			'course' => $course,
			'removeMessage' => "Item Removed"
		];
		return view('pages/course_list', $data);
	}

	function updateCourse($id)
	{
		$db = db_connect();
		$model = new CourseModel($db);

		$course = $model->getCourseData();
		$get_course = $model->find($id);
		$data = [
			'course' => $course,
			'get_course' => $get_course,
		];
		return view('pages/course_list', $data);
	}

	function update()
	{
		$db = db_connect();
		$model = new CourseModel($db);

		if ($this->request->getMethod() == 'post') {
			$updatedData = ([
				'id' => $this->request->getPost('id'),
				'topic' => $this->request->getPost('topic'),
				'description' => $this->request->getPost('description')
			]);

			$model->updateData($updatedData);
			$course = $model->getCourseData();
			$data = [
				'course' => $course,
				'updateMessage' => 'Updated Successfully'
			];
			return view('pages/course_list', $data);
		}
	}

	function searchCourse()
	{
		$db = db_connect();
		$model = new CourseModel($db);

		$inputData = [
			'input' => $this->request->getGet('course')
		];

		$result =	$model->searchCourse($inputData);
		$course = $model->getCourseData();

		$resultData = [
			'result' => $result['dataResult'],
			'count' => 	$result['countResult'],
			'course' => $course,
		];

		return view('pages/course_list', $resultData);
	}
	//--------------------------------------------------------------------
}
