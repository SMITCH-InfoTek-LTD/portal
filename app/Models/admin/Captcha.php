<?php
namespace App\Models;
use CodeIgniter\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Captcha
 *
 * @author osagiesammy
 */
class Captcha extends Model {

    //put your code here
    function __construct() {
        parent::__construct();
         $this->load->helper('captcha');
    }

    function make_captcha() {
        
        $vals = array(
        'word'          => '',
        'img_path'      => './assets/captcha/',
        'img_url'       => base_url() .'assets/captcha/',
        'font_path'     => base_url() .'assets/font/GRUNJA__.ttf',
        'img_width'     => '200',
        'img_height'    => '50',
        'expiration'    => 3600,
        'word_length'   => 8,
        'font_size'     => 30,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0,0,205,0.3),
                'grid' => array(192,192,192,0.3)
        )
);

// Create captcha

        $cap = create_captcha($vals);

// Write to DB
        if ($cap) {

            $data = array(
                'captcha_id' => '',
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word'],
            );

            $query = $this->db->insert_string('captcha', $data);

            $this->db->query($query);
        } else {

            return "Captcha not work";
        }

        return $cap['image'];
    }

    function check_captcha() {

// Delete old data ( 2hours)

        $expiration = time() - 3600;
        $sql = " DELETE FROM captcha WHERE captcha_time < ? ";
        $binds = array($expiration);
        $query = $this->db->query($sql, $binds);
//checking input
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count > 0) {
            return true;
        }
        return false;
    }

}
