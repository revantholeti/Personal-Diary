<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    public function checkdata($user){
        $this->load->database();
        $query=$this->db->query("select * from users where username='$user'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }
    public function newuser($user,$pass,$email){
        $this->load->database();
        $query=$this->db->query("insert into users(username,password,email) values ('$user','$pass','$email')");
    }

    public function checkuser($user){
        $this->load->database();
        $query=$this->db->query("select * from users where username='$user'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }

    public function checkuserforget($email,$username){
        $this->load->database();
        $query=$this->db->query("select * from users where username='$username' and email='$email'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }

    public function verify($code,$email){
        $this->load->database();
        $query=$this->db->query("select * from users where id='$code' and email='$email'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }

    public function update_password($pass,$id){
        $this->load->database();
        $query=$this->db->query("update users set password='$pass' where id='$id'");
    }
}
?>