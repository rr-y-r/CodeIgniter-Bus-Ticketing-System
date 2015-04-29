<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function index()
    {
        
        if (!$this->is_logged_in()) {
            $this->load->view('adminLogin');
        } else {
            redirect('site');
        }
    }
    
    public function loginCheck()
    {

        $is_user = $this->userModel->is($this->input->post('email'),$this->input->post('pwd'));

        if($is_user)
        {
            $email = $this->input->post('email');
            $userid = $this->userModel->get_id($email);
            $level = $this->userModel->isAdmin($email);
            
            echo $level;

            $data = array(
                'email' => $email,
                'userid' => $userid,
                'is_logged_in' => TRUE,
                'level' => $level
            );

            $this->session->set_userdata($data);
            if($level == 'admin')
            {
                redirect('admin');
            }
            else
            {
                redirect('mahasiswa');
            }
        } else 
        {
            redirect('login/error');
        }
        
    }
    
    public function error()
    {
        $this->load->view('adminLogin',array('error' => TRUE));
    }
    
    public function logout()
    {
        if (!$this->is_logged_in()) 
        {
            redirect('login');
        } else 
        {
            $this->session->set_userdata(array('is_logged_in' => FALSE));
            $this->session->sess_destroy();
            $this->load->view('adminLogin');
        }
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
}
