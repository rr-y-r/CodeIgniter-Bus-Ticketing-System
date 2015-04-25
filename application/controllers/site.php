<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->is_logged_in()) 
        {
            redirect('login');
        }
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    
    public function index()
    {
        $this->load->view('home');
    }
    
    
}