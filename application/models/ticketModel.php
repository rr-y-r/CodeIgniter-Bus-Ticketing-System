<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TicketModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($ticketid)
    {
        $ticket = $this->db
            ->get_where('ticket', array('ticketid' => $ticketid))
            ->result_array();

        return $ticket;
    }
    
    public function get_all()
    {
        return $this->db->select()
                ->get('ticket')
                ->result();
    }
    
     public function get_user_ticket()
    {
        return $this->db->select('ticketid,jenis,deskripsi,lampiran,file')
            ->order_by('ticketid')
            ->get('ticket')
            ->result_array();

    }


    public function get_by_user($userid)
    {
        $ticket = $this->db->select('*')
            ->order_by('ticket')
            ->get_where('ticket', array('userid' => $userid))
            ->result_array();

        return $ticket;
    }
 

    public function add($jenis,$deskripsi,$lampiran,$file,$userid)
    {        
        $this->db->insert('ticket', array(
                'jenis' => $jenis,
                'deskripsi'=>$deskripsi,
                'lampiran'=>$lampiran,
                'file'=>$file,
                'userid'=>$userid
            )
        ); 
        return TRUE;
    }

    public function delete($ticketid)
    {
        $this->db->where('ticketid',$ticketid);
        $this->db->delete('ticket');
    }

    public function updateAdmin($ticketid,$jenis,$deskripsi,$lampiran,$status)
    {
        $ticket =  array(
            'ticketid' => $ticketid,
            'jenis' => $jenis, 
            'deskripsi' => $deskripsi, 
            'lampiran' => $lampiran,
            'status' => $status
        );
        
        $this->db->where('ticketid',$ticketid);
        $this->db->update('ticket', $ticket);
    }

    
}
