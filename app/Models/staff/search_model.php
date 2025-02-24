<?php
namespace App\Models; 

use CodeIgniter\Model;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search_model
 *
 * @author doowo
 */
class Search_model extends Model{
    var $firstname;
    var $frmregno;
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->library('email');
    }
    
    function getAll(){
        //$this->firstname = $this->input->post('first_name');
        $this->lastname  = $this->input->post('last_name');
        $query = $this->db->get_where('tblloginDetails', array('first_name' => $this->firstname,'last_name'=>$this->lastname));
        //$query = $this->db->get_where('news',array('news_id'=>$id)); //get news item with news_id of $id
        if ($query->num_rows() > 0) {
            //$row = $query->row();
            //echo $row->first_name;
            //print_r($query->row());
            //yt$row = array();
            foreach ($query->result_array() as $row) {
                return $row;
            }
            //return $query->result_array();
        } else {
            return FALSE;
        }
        //$query = $this->db->get('entries', 10);
        //return $query->result();
    }
    
}

?>
