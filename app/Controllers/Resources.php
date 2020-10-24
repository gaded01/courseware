<?php

namespace App\Controllers;

use App\Models\CourseModel;
use CodeIgniter\I18n\Time;

class Resources extends BaseController
{

	public function insertResources($subtopic_id)
	{
		$db = db_connect();
		$model = new CourseModel($db);
		helper(['form']);
		$date = Time::parse('March 9, 2016 12:00:00', 'Asia/Manila');
		$created_at = $date->toLocalizedString('MMM d, yyyy');
		$reference = $model->getReference($subtopic_id);
		$subtopic = $model->subtopic($subtopic_id);
		$fileType = null;
		$img = null;

		$data = [
			'subtopic' => $subtopic,
			'reference' => $reference,
		];

		$rules = [
			'resource' => [
				'label' => 'Content Resources',
				'rules' => 'uploaded[resource.0]'
			],
		];

		if ($this->validate($rules)) {
			$resources = $this->request->getFiles();

			foreach ($resources['resource'] as $resource) {
				if ($resource->isValid() && !$resource->hasMoved()) {
					$title = $resource->getName();
					$size =  floor($resource->getSizeByUnit('kb'));
					$newName = $resource->getRandomName();
					$ext = $resource->getExtension();
					$type = $resource->getMimeType();
					$resource->move('./uploads', $newName);

					if ($ext == 'docx') {
						$fileType = 'Word';
						$img = 'word.png';
					} elseif ($ext == 'pptx' || $ext == 'ppt	') {
						$fileType = 'Presentation';
						$img = 'ppt.png';
					} elseif ($ext == 'pdf') {
						$fileType = 'PDF';
						$img = 'pdf.png';
					} elseif ($ext == 'pdf') {
						$fileType = 'Zip';
						$img = 'zip.png';
					} elseif (strpos($type, 'spreadsheetml') !== 'false') {
						$fileType = 'Excel';
						$img = 'excel.png';
					} elseif (strpos($type, 'image') !== 'false') {
						$fileType = 'Image';
						$img = 'img.png';
					} elseif (strpos($type, 'video') !== 'false') {
						$fileType = 'Video';
						$img = 'video.png';
					} elseif (strpos($type, 'text') !== 'false') {
						$fileType = 'Text';
						$img = 'txt.png';
					} else {
						$fileType = "Unrecognize";
						$img = 'txt.png';
					}
				
					$model->insertResource([
						'image' => $img,
						'title' => $title,
						'file_type' => $fileType,
						'file' => $newName,
						'size' => $size,
						'created_at' => $created_at,
						'subtopic_id' => $subtopic_id,
					]);
				}
			}
		} else {
			$data['validate'] = $this->validator;
		}

		$data['resources'] = $model->getResources($subtopic_id);
		return view('pages/content_update', $data);
	}

	public function removeResource($resource_id, $subtopic_id)
	{
		$db = db_connect();
		$model = new CourseModel($db);

		$model->removeResource($resource_id);
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



}