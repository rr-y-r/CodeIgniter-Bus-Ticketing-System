<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RoomModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($roomID)
    {
        $room = $this->db
            ->get_where('dorm_room', array('roomid' => $roomid))
            ->result_array();

        return $room;
    }
    
    public function get_all()
    {
        $room = $this->db->order_by('nomor')
            ->get('dorm_room')
            ->result_array();

        return $room;
    }


    public function get_by_nomor($nomor)
    {
        $room = $this->db->select('*')
            ->order_by('room')
            ->get_where('dorm_room', array('room' => room))
            ->result_array();

        return $room;
    }
 

    public function add($nomor,$fasilitas,$kapasitas)
    {
        $query = $this->db->get_where('dorm_room', array('nomor' => $nomor));
        
        if ($query->num_rows == 1) 
        {
            return FALSE;
        }
        
        $this->db->insert(
            'dorm_room', 
            array(
                'nomor' => $nomor,
                'fasilitas'=>$fasilitas,
                'kapasitas'=>$kapasitas
            )
        ); 
        return TRUE;
    }

    public function delete($nomor)
    {
        $userid = $this->db->get_where('dorm_room', array('nomor' => nomor))->row()->roomid;
        
        $this->db->delete('dorm_room', array('roomid' => $roomid));
    }

    public function update($roomid,$nomor,$fasilitas,$kapasitas)
    {
        $room =  array(
            'roomid' => $$roomid,
            'nomor' => $nomor, 
            'fasilitas' => $fasilitas, 
            'kapasitas' => $kapasitas
        );
        
        $this->db->where('roomid',$roomid);
        $this->db->update('dorm_room', $room);
    }

    
}
