<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
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
       $dorm = $this->roomModel->get_all();
        $this->load->view('adminCMS', array(
            'dorm_room' => $dorm
        ));

    }
    
    public function addRoom()
    {
        sleep(1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Nomor', 'Nomor', 'required|max_length[3]|numeric');
        $this->form_validation->set_rules('Fasilitas', 'Fasilitas', 'required|max_length[32]|alpha_numeric');
        $this->form_validation->set_rules('Kapasitas', 'Kapasitas', 'required|max_length[3]|numeric');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $message = "<strong>Adding</strong> failed!";
            $this->json_response(FALSE, $message);
        } 
        else 
        {
            $is_added = $this->roomModel->add(
                $this->input->post('Nomor'), 
                $this->input->post('Fasilitas'), 
                $this->input->post('Kapasitas')
            );
            
            if ($is_added) 
            {
                $message = "Kamar Nomor : <strong> ".$this->input->post('Nomor')."</strong> berhasil ditambahkan !";
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "Kamar Nomor : <strong> ".$this->input->post('Nomor')."</strong> sudah ada !";
                $this->json_response(FALSE, $message);
            }
        }
    }
    
    public function deleteRoom()
    {
        $room = $this->roomModel->getNomor();
        
        $this->load->view('room', array(
            'room' => room
        ));
    }
    
    
    public function editRoom()
    {
        sleep(1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Roomid', 'Roomid', 'required|max_length[3]|numeric');
        $this->form_validation->set_rules('Nomor', 'Nomor', 'required|max_length[3]|numeric');
        $this->form_validation->set_rules('Fasilitas', 'Fasilitas', 'required|max_length[32]|alpha_numeric');
        $this->form_validation->set_rules('Kapasitas', 'Kapasitas', 'required|max_length[3]|numeric');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $message = "<strong>Editing</strong> gagal!";
            $this->json_response(FALSE, $message);
        } 
        else 
        {
            $is_added = $this->roomModel->update(
                $this->input->post('Roomid'),
                $this->input->post('Nomor'), 
                $this->input->post('Fasilitas'), 
                $this->input->post('Kapasitas')
            );
            
            if ($is_added) 
            {
                $message = "Kamar Nomor : <strong> ".$this->input->post('Nomor')."</strong> berhasil ditambahkan !";
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "Kamar Nomor : <strong> ".$this->input->post('Nomor')."</strong> sudah ada !";
                $this->json_response(FALSE, $message);
            }
        }
    }
    
    private function json_response($successful, $message){
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        )); 
    }

    
}