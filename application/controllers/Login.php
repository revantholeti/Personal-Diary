<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->model('Login_model');
        $this->load->model('Home_model');
        $this->load->library(array('form_validation','session'));
    }

    public function index(){
        $this->load->view('Login_view');
    }

    public function register(){
        $this->load->view('Register_view');
    }
    public function register_insert(){
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('username','username','required|alpha_numeric');
        $this->form_validation->set_rules('password','password','required|trim|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('confirm_password','Confirm_password','required|trim|matches[password]|alpha_numeric');
        if($this->form_validation->run()==TRUE){
            $email=$this->input->post('email');
            $user=$this->input->post('username');
            $pass=$this->input->post('password');
            $confirm_pass=$this->input->post('confirm_password');
            $data=$this->Login_model->checkdata($user);
            if(!$data){
                $encrypted_key=md5($pass);
                $this->Login_model->newuser($user,$encrypted_key,$email);
                $this->session->set_flashdata('error','Successfully Registered');
                redirect(base_url()."Login");
            }
            else{
                $this->session->set_flashdata('error','Username already exist');
                redirect(base_url()."Login/register");
            }
        }
        else{
            $this->load->view("Register_view");
        }
    }
    public function login(){
        $this->form_validation->set_rules('username','username',"required|alpha_numeric");
        $this->form_validation->set_rules('password','password',"required|alpha_numeric");
        if($this->form_validation->run()==TRUE){
            $user=$this->input->post('username');
            $pass=$this->input->post('password');
            $data=$this->Login_model->checkuser($user);
            $decrypted_key=md5($pass);
            if(!empty($data)){
                foreach($data as $d){
                    if($decrypted_key==$d->password){
                        $this->session->set_userdata('userid',$d->username);
                        $this->session->set_userdata('id',$d->id);
                        $list['data']=$this->Home_model->retrive($d->id);
                        $this->load->view('List_view',$list);
                    }
                    else{
                        $this->session->set_flashdata('error','entered password is wrong.. please try again');
                        redirect(base_url()."Login");
                    }
                }
            }
            else{
                $this->session->set_flashdata('error','wrong username or password');
                $this->load->view('Login_view');
            }
        }
        else{
            $this->session->set_flashdata('error','enter username and password');
            $this->load->view('Login_view');
        }
    }

    public function forget_page(){
        $this->load->view('Forget_view');
    }

    public function forget(){
            $email=$this->input->post('email');
            $username= $this->input->post('username');
            $data=$this->Login_model->checkuserforget($email,$username);
            if($data){
        
                $config=Array(
                    'protocol'=>'smtp',
                    'smtp_host'=>'ssl://smtp.googlemail.com',
                    'smtp_port'=>'465',
                    'smtp_user'=>'daysaverwithdiary@gmail.com',
                    'smtp_pass'=>'rio@1234',
                );
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from("",'');
                foreach($data as $d){
                    $this->email->to($d->email);
                    $this->email->subject("Daily Diary Password Recovery");
                    $this->email->message("The recovery password code is  : $d->id");
                }
                if($this->email->send()){
                    $this->session->set_flashdata('error','check the mail you have registered');
                    $this->load->view('Forget_view');
                }else{
                    $this->session->set_flashdata('error','network error');
                    $this->load->view('Forget_view');
                }
            }
            else{
                $this->session->set_flashdata('error','username or email is missmatched, please enter registered mail and username');
                $this->load->view('Forget_view');
            }
    }

    public function forgetview(){
        $this->load->view('Forget_view');
    }

    public function enter_code(){
        $this->load->view('Code_entry_view');
    }

    public function verify(){
        $code=$this->input->post('code');
        $email=$this->input->post('email');
        $data=$this->Login_model->verify($code,$email);

        if($data){
            $this->session->set_flashdata('error','successfully verified, change your password');
            foreach($data as $d){
                $this->session->set_userdata('id',$d->id);
            }
            $this->load->view('Password_change_view');
        }
        else{
            $this->session->set_flashdata('error','username or email is missmatched, please enter registered mail and username');
            $this->load->view('Code_entry_view');
        }
    }

    public function update_password(){
        $this->form_validation->set_rules('password','password','required|trim|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('confirm_password','Confirm_password','required|trim|matches[password]|alpha_numeric');
        if($this->form_validation->run()==TRUE){
            $pass=$this->input->post('password');
            $confirm_pass=$this->input->post('confirm_password');
            $id=$this->session->userdata('id');
            $this->Login_model->update_password(md5($pass),$id);
            $this->session->set_flashdata('error','password changed successfully');
            $this->session->unset_userdata('id');
            $this->load->view('Login_view');
        }
        else{
            $this->session->set_flashdata('error','password and confirm password are miss matched');
            $this->load->view("Password_change_view");
        }
    }

    public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect(base_url().'Login');
    }
}
?>