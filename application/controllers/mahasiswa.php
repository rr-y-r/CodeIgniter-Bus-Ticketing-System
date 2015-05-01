<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->is_logged_in()) 
        {
            redirect('login');
        }
        $this->load->model('fileModel');
        $this->load->model('ticketModel');
    }
    
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    
    public function getTicketData(){
        sleep(1);
        echo json_encode(array('userticketData'=>$this->ticketModel->get_user_ticket()));
    }
    
    public function getProcessedTicketData(){
        sleep(1);
        echo json_encode(array('processedticketData'=>$this->ticketModel->get_all()));
    }
    
    public function index()
    {
        $data = $this->ticketModel->get_user_ticket();
        $this->load->view('mahasiswa', array('userticketData'=>$data));
                
    }

    public function addTicket()
    {
        sleep(1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required|max_length[32]');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|max_length[32]');
        $this->form_validation->set_rules('Lampiran', 'Lampiran', 'required|max_length[100]');
        $this->form_validation->set_rules('Status', 'Status', 'required|max_length[100]');

        $this->form_validation->set_rules('file', 'file', 'required|max_length[100]');
        
        
        $userid = $this->session->userdata('userid');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $message = "apply gagal, tolong cek data ticket";
            $this->json_response(FALSE, $message);
        } 
        else 
        {
            $is_added = $this->ticketModel->add(
                $this->input->post('Jenis'), 
                $this->input->post('Deskripsi'), 
                $this->input->post('Lampiran'),
                $this->input->post('Status'),
                $this->input->post('file'),
                $userid
            );
            
            if ($is_added) 
            {
                $message = "Ticket berhasil diapply !";
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "apply gagal, tolong cek data ticket";
                $this->json_response(FALSE, $message);
            }
        }
    }
    
    public function deleteTicket($ticketid)
    {
        sleep(1);
        $this->ticketModel->delete($ticketid);
    }
    
    
    public function editTicket()
    {
        sleep(1);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Ticketid', 'Ticketid', 'required|max_length[13]');
        $this->form_validation->set_rules('Jenis', 'Jenis', 'required|max_length[13]');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|max_length[32]');
        $this->form_validation->set_rules('Lampiran', 'Lampiran', 'required|max_length[100]');
        $this->form_validation->set_rules('Status', 'Status', 'required|max_length[100]');
        $this->form_validation->set_rules('title', 'title', 'required|max_length[100]');
        
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
                $this->input->post('Status')
            );
            
            if ($is_updated) 
            {
                $message = "ticket Nomor : <strong> ".$this->input->post('ticketid')."</strong> berhasil ditambahkan !";
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "ticket Nomor : <strong> ".$this->input->post('ticketid')."</strong> Edit Error, silahkan cek data anda !";
                $this->json_response(FALSE, $message);
            }
        }
    }

    public function files()
    {
        $files = $this->fileModel->get_files();
        $this->load->view('files', array('files' => $files));
    }
    
    public function delete_file($file_id)
    {
        if ($this->fileModel->delete_file($file_id))
        {
            $status = 'success';
            $msg = 'File successfully deleted';
        }
        else
        {
            $status = 'error';
            $msg = 'Something went wrong when deleteing the file, please try again';
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    
    public function upload_file()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';
        $userid = $this->session->userdata('userid');

        if (empty($_POST['title']))
        {
            $status = "error";
            $msg = "nama file masih kosong";
        }
        
        if ($status != "error")
        {
            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $file_id = $this->fileModel->insert_file($data['file_name'], $_POST['title'], $userid);
                if($file_id)
                {
                    $status = "success";
                    $msg = "File berhasil di unggah";
                }
                else
                {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "terdapat error dalam pengunggahan file";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    
    private function json_response($successful, $message){
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        )); 
    }

    
}