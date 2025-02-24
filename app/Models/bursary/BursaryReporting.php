<?php

namespace App\Models; 
<<<<<<< HEAD

=======
>>>>>>> a3c25aa (Converting CI 3 application to CI 4 :: continuation of updating the Model)
use CodeIgniter\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BursaryReporting
 *
 * @author osagiesammy
 */
class BursaryReporting extends Model {

    //put your code here
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('session');
        $this->load->library('email');
    }

    function getStudentsPayments($id) {
        //$this->db->limit($limit);
        $this->db->where(array('RegNumb'=> $id,'status'=>'01'));
        $query = $this->db->get("paymentTrans");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                /*                 * *
                  $tempStudent_type[] = $row->Student_type;
                  $tempItem_Code[] = $row->Item_Code;
                  $tempOrderID[] = $row->OrderID;
                  $tempAmount[] = $row->Amount;
                  $temppayment_type[] = $row->payment_type;
                  $tempRRR[] = $row->RRR;
                  $temptransID[] = $row->transID;
                  $tempmessage[] = $row->message;
                  $tempstatus[] = $row->status;
                  $temptransactiontime[] = $row->transactiontime;
                  $tempacademic_session[] = $row->academic_session;
                 * 
                 */
            }
            return $data;
        }
        return FALSE;
    }

}
