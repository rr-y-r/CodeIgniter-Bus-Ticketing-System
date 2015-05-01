<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Admingrace extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->is_logged_in() || ( $this->is_admin() != 'admin')) 
        {
            echo $this->is_admin();
            $this->session->sess_destroy();
            redirect('login');
        }
        $this->load->model('ticketModel');
    }
    
    private function is_admin()
    {
        return $this->session->userdata('email');
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    
    public function editTicket()
    {
        sleep(1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Ticketid', 'Ticketid', 'max_length[13]');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'max_length[13]');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'max_length[32]');
        $this->form_validation->set_rules('Lampiran', 'Lampiran', 'max_length[255]');
        $this->form_validation->set_rules('Status', 'Status', 'max_length[255]');
        $this->form_validation->set_rules('Expired', 'Expired', 'max_length[100]');        
        $this->form_validation->set_rules('Pesan', 'Pesan', 'max_length[100]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $message = "<strong>Editing</strong> gagal!";
            $this->json_response(FALSE, $message);
        } 
        else 
        {
            $is_updated = $this->ticketModel->update(
                $this->input->post('Ticketid'), 
                $this->input->post('Jenis'), 
                $this->input->post('Deskripsi'), 
                $this->input->post('Lampiran'),
                $this->input->post('Status'),
                $this->input->post('Expired'),
                $this->input->post('Pesan')
                
            );
            
            if ($is_updated) 
            {
                $message = "ticket Nomor : <strong> ".$this->input->post('Ticketid')."</strong> berhasil diubah !";
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "ticket Nomor : <strong> ".$this->input->post('Ticketid')."</strong> Edit Error, silahkan cek data anda !";
                $this->json_response(FALSE, $message);
            }
        }
    }
    
    public function index()
    {
        $ticket = $this->ticketModel->get_all();
        //$data = json_encode($dorm);
        $this->load->view('admingrace', array(
            'ticketData' => $ticket
        ));
    }
    
        public function deleteTicket($ticketid)
    {
        sleep(1);
        $this->ticketModel->delete($ticketid);
    }
    

    
    public function getTicketData()
    {
        echo json_encode(array('ticket'=>$this->ticketModel->get_all()));
    }
 
    private function json_response($successful, $message){
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        )); 
    }

    
}