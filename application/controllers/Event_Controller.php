<?php

class Event_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Karachi');
		$this->load->model('Event_Model');
	}
	public function index()
	{
		$data['data'] = $this->Event_Model->fetch_record();
		// $arr = array();
		// foreach ($data as $key => $value) {
		// 	$event_img = $this->Event_Model->event_img($value['EventId']);
		// 	$new_arr = array(
		// 		'EventId' => $value['EventId'],
		// 		'Title' => $value['Title'],
		// 		'Detail' => $value['Detail'],
		// 		'EventDate' => $value['EventDate'],
		// 		$key => $event_img
		// 	);
		// 	$arr[] = $new_arr;
		// }


		// $arr_data['arr'] = $arr;
		$this->load->view('event_view', $data);
	}

	public function insert_data()
	{
		$config = [
			'upload_path' => "./upload_images/",
			'allowed_types' => "jpg|jpeg|png",
		];
		$this->load->library('upload', $config);
		$event_date = $this->input->post('sliderdate');
		$title = $this->input->post('title');
		$detail = $this->input->post('detail');
		$upload_files = $_FILES['file']['name'];
		$text = $_POST['text'];

		$event = [
			'Title' => $title,
			'EventDate' => $event_date,
			'Detail' => $detail
		];
		$id = $this->Event_Model->Insert_record('nqash_cms.tblevent', $event);

		$files = $_FILES;
		$cpt = count($_FILES['file']['name']);
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['file']['name'] = $files['file']['name'][$i];
			$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
			$_FILES['file']['error'] = $files['file']['error'][$i];
			$_FILES['file']['size'] = $files['file']['size'][$i];
			if ($this->upload->do_upload('file')) {
				$data['error'] = array('error' => '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="Successfully!"></button><strong>Successfully!: </strong>Record Has Been Saved.</div>');
				$event_detail = [
					'EventId' => $id,
					'Image' =>  $files['file']['name'][$i],
					'Alternative' => $text[$i]
				];
				$this->Event_Model->Insert_record('nqash_cms.tbleventimage', $event_detail);
			} else {
				$data['error'] = array('error' => '<div class="  col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="Alert!"></button><strong>Alert!: </strong>File Type Must Be Png ,Jpg And jpeg.</div>');
			}
		}
		$this->load->view('event_view', $data);
	}
}
