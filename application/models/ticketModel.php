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
        $ticket = $this->db->select()
                ->get('ticket')
                ->result_array();
        
        return $ticket;
    }
    
     public function get_user_ticket()
    {
        return $this->db->select('ticketid,jenis,deskripsi,lampiran,file,status')
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
 

    public function add($jenis,$deskripsi,$lampiran,$status,$file,$userid)
    {        
        $this->db->insert('ticket', array(
                'jenis' => $jenis,
                'deskripsi'=>$deskripsi,
                'lampiran'=>$lampiran,
                'status'=>$status,
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

    public function update($ticketid,$jenis,$deskripsi,$lampiran,$status,$expired,$pesan)
    {
        $ticket =  array(
            'jenis' => $jenis, 
            'deskripsi' => $deskripsi, 
            'lampiran' => $lampiran,
            'status' => $status,
            'expired' => $expired,
            'pesan' => $pesan
        );
        
        $this->db->where('ticketid',$ticketid)
                ->update('ticket', $ticket);
        
        return TRUE;
    }
    
    

    
}
