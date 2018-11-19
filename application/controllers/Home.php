<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','file','form','html'));
        $this->load->database();
        $this->load->model('Home_model');
        $this->load->library(array('form_validation','session'));
    }

    public function load_newentry(){
        $this->load->view('Home_view');
    }

    public function doupload(){
        $this->load->helper(array('file'));
        $username=$this->session->userdata('userid');
        $config['upload_path']='./images/';
        $config['allowed_types']='jpg|jpeg|gif|png';
        $config['file_name']=time().$username;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload()){
            // echo $this->upload->display_errors();
        }
        else{
            $file_data=$this->upload->data();
            return $file_data['file_name'];
        } 
    }

    public function load_list(){
        $id=$this->session->userdata('id');
        $this->Home_model->deletedate();
        $list['data']=$this->Home_model->retrive($id);
        $this->load->view('List_view',$list);
    }

    public function newdiary(){
        $url=$this->doupload();
        $id=$this->session->userdata('id');
        $data=$this->input->post('this_day');
        $date=$this->input->post('present_date');
        $checkdate=$this->Home_model->checkdate($date,$id);
        if($checkdate){
            $this->load->view('Home_view');
        }
        else{    
            $this->Home_model->insert($id,$date,$data,$url);
            redirect(base_url().'Home/load_list');
        }
    }

    public function display($date=NULL){
        $id=$this->session->userdata('id');
        $data['details']=$this->Home_model->details($date,$id);
        $this->load->view('Diary_view',$data);
    }

    public function profile(){
        $id=$this->session->userdata('id');
        $data['details']=$this->Home_model->getdetails($id);
        $data['total']=$this->Home_model->gettotal($id);
        $this->session->set_flashdata('error','entered password is wrong.. please try again');
        $this->load->view("Profile_view",$data);
    }

    public function profile_upload(){
        $this->load->view("Profile_upload_view");
    }

    public function upload_profile(){
        $url=$this->doupload();
        $id=$this->session->userdata('id');
        $quote=$this->input->post('quote');
        $image=$this->Home_model->selectprofile_pic($id);
        $this->Home_model->update_profile($id,$quote,$url);
        error_reporting(E_ERROR | E_PARSE);
        if($image){
        foreach($image as $i){
        unlink("./images/".$i->profileimage);}
        }
        $data['details']=$this->Home_model->getdetails($id);
        $data['total']=$this->Home_model->gettotal($id);
        $this->load->view('Profile_view',$data);
        
    }

    public function changeusername(){
        $id=$this->session->userdata('id');
        $this->form_validation->set_rules('new_username','username',"required|alpha_numeric");
        $this->form_validation->set_rules('confirm_new_username','username',"required|alpha_numeric|matches[new_username]");
        if($this->form_validation->run()==TRUE){
            $username=$this->input->post("new_username");
            $this->Home_model->updateusername($id,$username);
            $this->session->set_flashdata('error','Username is upadated');
            $this->load->view("Profile_upload_view");
        }
        else{
            $this->session->set_flashdata('error','Both columns should match');
            $this->load->view("Profile_upload_view");
        }
    }

    public function changepassword(){
        $id=$this->session->userdata('id');
        $this->form_validation->set_rules('new_password','password',"required|alpha_numeric");
        $this->form_validation->set_rules('confirm_new_password','password',"required|alpha_numeric|matches[new_password]");
        if($this->form_validation->run()==TRUE){
            $password=$this->input->post("new_password");
            $this->Home_model->updatepassword($id,md5($password));
            $this->session->set_flashdata('error','Password is upadated');
            $this->load->view("Profile_upload_view");
            
        }
        else{
            $this->session->set_flashdata('error','entered password is wrong.. please try again');
            $this->load->view("Profile_upload_view");
        }
    }   
    
    public function Instructions(){
        $this->load->view("Instructions_view");
    }

    public function Contact(){
        $this->load->view("Contact_view");
    }

    public function send_mail() { 
        $email=$this->input->post('email');
        $content= $this->input->post('content');
        $user = $this->session->userdata('userid');
        $config=Array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_port'=>'465',
            'smtp_user'=>'daysaverwithdiary@gmail.com',
            'smtp_pass'=>'rio@1234',
        );
        $sub='From user '.$user.' with email '.$email;
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from("",'');
        $this->email->to('daysaverwithdiary@gmail.com');
        $this->email->subject($sub);
        $this->email->message($content);
        if($this->email->send()) 
        $this->session->set_flashdata("error","email sent successfully."); 
        else 
        $this->session->set_flashdata("error","error in sending Email.");
        $this->load->view('Contact_view'); 
     } 
}

?>