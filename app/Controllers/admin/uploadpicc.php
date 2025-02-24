<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploadpicc extends BaseController {

	function __construct()
	{
		parent::__construct();
                session_start();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->database();
	}

	function index()
	{
                echo view('template/header');
		echo view('staff/uploadpassport', array('error' => ' ' ));
                echo view('template/footer');
	}

	function do_upload()
	{
		$config['upload_path'] 		= './assets/uploads/staff/'; //echo $config['upload_path'];
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']		= '100';
		$config['max_width']  		= '100';
		$config['max_height']  		= '100';
		$config['encrypt_name'] 	= TRUE;
		$config['remove_spaces'] 	= TRUE;
		$config['max_filename'] 	= 12;
		$this->load->library('upload', $config);
                //echo "The regno " . $_SESSION['regno'];
                //echo $config['upload_path'];
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        //print_r($error);
			echo view('template/header');
                        echo view('staff/uploadpassport', $error);
                        echo view('template/footer');
		}else{
			$data = array('upload_data' => $this->upload->data());
			$photoname = $data["upload_data"]["file_name"];
			$staffID = $_SESSION['staffNo'];
			//echo $staffID . '    '.$photoname;
                        //echo $data;
			//$value = array('photo' => $photoname);
			//echo $value['photo'];
			$where = "staffID = '$staffID'";
			$data = array(
                             'photo' => $photoname
                        );
         $this->db->where('staffID', $staffID);
	 $this->db->update('staff', $data);
         $info = array('upload_data' => $this->upload->data(),'data' => $data);
         //print_r($info);
             if($this->db->affected_rows() > 0){
                 echo view('template/header');
                 echo view('menu/staffmenu');
                 echo view('staff/success', $info);
                 echo view('template/footer');
                 //echo '<meta http-equiv="refresh"' . 'content="0;URL="'.base_url().'index.php/successc">';
             }
	}
}
}
?>