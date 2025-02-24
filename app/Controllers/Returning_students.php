<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Returning_students
 *
 * @author osagiesammy
 */
class Returning_students extends BaseController{
    //put your code here
	public function index()
	{	
		$this->load->helper('url');
		$this->load->view('template/header');
                $this->load->view('template/header_menu');
		$this->load->view('returning_students');
		$this->load->view('template/footer_other');
	}
}
