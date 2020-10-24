<?php

namespace App\Models;

use App\Controllers\Reference;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MySQLi\Builder;

class CourseModel
{

  protected $db;

  public function __construct(ConnectionInterface &$db)
  {
    $this->db = &$db;
  }

  function getCourseData()
  {

    $builder = $this->db->table('course');
    $posts = $builder->get()->getResult();

    return $posts;
  }

  function find($id)
  {

    $builder = $this->db->table('course');
    $builder->where('id', $id);
    $posts = $builder->get()->getResult();

    return $posts;
  }

  function insertCourse($data)
  {

    $builder = $this->db->table('course');
    $builder->insert($data);
  }

  function deleteData($id)
  {

    $builder = $this->db->table('course');
    $builder->where('id', $id);
    $builder->delete();
  }

  function updateData($data)
  {

    $builder = $this->db->table('course');
    $builder->where('id', $data['id']);
    $builder->update($data);
  }

  function searchCourse($data)
  {
    $builder = $this->db->table('course');

    $builder->like('id', $data['input']);
    $builder->orLike('topic', $data['input']);
    $builder->orLike('description', $data['input']);

    $dataResult = $builder->get()->getResult();

    $countQuery = $this->db->table('course');

    $countQuery->like('id', $data['input']);
    $countQuery->orLike('topic', $data['input']);
    $countQuery->orLike('description', $data['input']);

    $countResult = $countQuery->countAllResults();

    $result = [
      'dataResult' => $dataResult,
      'countResult' => $countResult
    ];
    return $result;
  }

  function getSubtopic($id)
  {

    $builder = $this->db->table('course');
    $builder->select('*');
    $builder->join('subtopic', 'course.id = subtopic.course_id', 'inner');
    $builder->where('id', $id);
    $result = $builder->get()->getResult();

    return $result;
  }

  function subtopic($subtopic_id)
  {

    $builder = $this->db->table('subtopic');
    $builder->select('*');
    $builder->join('course', 'subtopic.course_id = course.id', 'inner');
    $builder->where('subtopic_id', $subtopic_id);
    $result = $builder->get()->getResult();

    return $result;
  }


  function addSubtopic($data)
  {
    $builder = $this->db->table('subtopic');
    $builder->insert($data);
  }

  function deleteSubtopic($id)
  {
    $builder = $this->db->table('subtopic');
    $builder->where('subtopic_id', $id);
    $builder->delete();
  }

  function updateSubtopic($data)
  {
    $builder = $this->db->table('subtopic');
    $builder->where('subtopic_id', $data['subtopic_id']);
    $builder->update($data);
  }

  function searchSubtopic($data)
  {
    $builder = $this->db->table('subtopic');

    $builder->like('subtopic_id', $data['input']);
    $builder->orLike('sub_topic', $data['input']);
    $dataResult = $builder->get()->getResult();

    $counteQuery = $this->db->table('subtopic');

    $counteQuery->like('subtopic_id', $data['input']);
    $counteQuery->orLike('sub_topic', $data['input']);
    $count = $counteQuery->countAllResults();
    
    $result = [
      'dataResult' => $dataResult,
      'countResult' =>  $count
    ];
    
    return $result;
  }

  function  updateContent($data)
  {
    $builder = $this->db->table('subtopic');
    $builder->where('subtopic_id', $data['subtopic_id']);

    $builder->update($data);
  }

  function addReference($data)
  {
    $builder = $this->db->table('reference');
    $builder->insert($data);
  }

  function getReference($subtopic_id)
  {
    $builder = $this->db->table('reference');
    $builder->select('*');
    $builder->join('subtopic', 'reference.subtopic_id = subtopic.subtopic_id');
    $builder->where('reference.subtopic_id', $subtopic_id);
    $result = $builder->get()->getResult();

    return $result;
  }

  function deleteReference($reference_id)
  {
    $builder = $this->db->table('reference');
    $builder->where('reference_id', $reference_id);

    $builder->delete();
  }

  function reference($reference_id)
  {
    $builder = $this->db->table('reference');
    $builder->select('*');
    $builder->where('reference_id', $reference_id);
    $result = $builder->get()->getResult();

    return $result;
  }

  function updateReference($data)
  {
    $builder = $this->db->table('reference');
    $builder->where('reference_id', $data['reference_id']);

    $builder->update($data);
  }

  function insertResource($data)
  {
    $builder = $this->db->table('resources');
    $builder->insert($data);
  }

  function getResources($subtopic_id)
  {
    $builder = $this->db->table('resources');
    $builder->where('subtopic_id', $subtopic_id);
    $result = $builder->get()->getResult();

    return $result;
  }

  function removeResource($resource_id)
  {
    $builder = $this->db->table('resources');
    $builder->where('resource_id', $resource_id);
    $builder->delete();
  }
 
}