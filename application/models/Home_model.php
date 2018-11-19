<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{
    public function insert($id,$date,$data,$url){
        $this->load->database();
        $this->db->query("insert into daily(id,today_date,data,image) values ('$id','$date','$data','$url')");
    }

    public function retrive($id){
        $this->load->database();
        $query=$this->db->query("select * from daily where id='$id' order by today_date desc");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function details($date,$id){
        $this->load->database();
        $query=$this->db->query("select * from daily where id='$id' and today_date='$date'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function update_profile($id,$quote,$url){
        $this->load->database();
        $this->db->query("update users set profileimage='$url',quote='$quote' where id='$id'");
    }

    public function getdetails($id){
        $this->load->database();
        $query=$this->db->query("select * from users where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function gettotal($id){
        $this->load->database();
        $query=$this->db->query("select count(id) as total from daily where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function updateusername($id,$username){
        $this->load->database();
        $this->db->query("update users set username='$username' where id='$id'");
    }

    public function updatepassword($id,$password){
        $this->load->database();
        $this->db->query("update users set password='$password' where id='$id'");
    }

    public function selectprofile_pic($id){
        $this->load->database();
        $query=$this->db->query("select profileimage from users where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function checkdate($date,$id){
        $this->load->database();
        $query=$this->db->query("select today_date from daily where id='$id' and today_date='$date'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function deletedate(){
        $this->load->database();
        $this->db->query("delete from daily where today_date='0000-00-00'");
    }
}
?>