<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewRegCand
 *
 * @author osagiesammy
 */
class ViewRegCand extends BaseController {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('table');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->model('secured/Report_m');
    }

    public function index() {
        $data = array('title' => 'view registered candidates'
        );
        //pagination settings
        //$this->config->load('pagination');
        $config['base_url'] = site_url('secured/admin/ViewRegCand');
        $config['total_rows'] = $this->db->count_all('jambupload');
        $config['per_page'] = 20;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        //print_r($config);
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //call the model function to get the department data
        $data['applicantlist'] = $this->Report_m->get_applicants_list($config['per_page'], 0);
        $data['pagination'] = $this->pagination->create_links();
        //load the department_view 
        echo view('template/header');
        echo view('template/header_menu');
        echo view('secured/admin/ViewRegCand', $data);
        echo view('template/footer_other');
    }

}
