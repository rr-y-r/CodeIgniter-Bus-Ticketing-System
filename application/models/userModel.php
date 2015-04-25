<?php

class UserModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all($userid)
    {
        $users = $this->db
            ->get_where('user', array('userid' => $userid))
            ->result_array();

        return $users;
    }

    public function get_id($email)
    {
        $row = $this->db->get_where('user', array('email' => $email))->row();
        return $row->userid;
    }
/*
    public function get_names($userid)
    {
        $users = $this->db->select('name_p')
            ->order_by('name_p')
            ->get_where('user', array('userid' => $userid))
            ->result_array();

        return $users;
    }
*/    
    public function get_emails()
    {
        $users = $this->db->select('email')
            ->order_by('email')
            ->get('user')
            ->result_array();

        return $users;
    }
/*
    public function add($name_p,$jenis_kelamin,$tempat,$tanggal_lahir,$phone,$alamat,$email, $password)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        
        if ($query->num_rows == 1) {
            return FALSE;
        }
        
        $this->db->insert('users', array('Alamat' => $alamat, 'email' => $email,
                                        'Alamat'=>$alamat,
                                        'jenis_kelamin'=>$jenis_kelamin,
                                         'tanggal_lahir'=>$tanggal_lahir,
                                        'name_p'=>$name_p,
                                        'password'=>$password,
                                        'phone'=>$phone,
                                        'tempat'=>$tempat)); 
        
        return TRUE;
    }

    public function delete($email)
    {
        $userid = $this->db->get_where('users', array('email' => $email))->row()->userid;
        
        $this->db->delete('izin', array('userid' => $userid));
        
        $this->db->delete('users', array('email' => $email));
    }

    public function update($email, $phone, $password)
    {
        $data =  array('email' => $email, 
                        'phone' => $phone, 
                        'password' => $password);
        $this->db->where('email',$email);
        $this->db->update('users', $data);
    }
*/
    public function check_password($userid, $password)
    {
        $check = $this->db->get_where('user', array('userid' => $userid, 'password' => $password));
        
        return ($check->num_rows == 1) ? TRUE : FALSE;
    }
/*
    public function update_password($userid, $password)
    {
        return $this->db->update('users', array('password' => $password), array('userid' => $userid));
    }
    
    public function update_profile($userid,$tempat,$alamat){
        $this->db->where('userid',$userid);
        return $this->db->update('users',array('tempat'=>$tempat,
                                                   'alamat'=>$alamat));
    }
*/
    public function is($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
        
        return ($query->num_rows == 1) ? TRUE : FALSE;
    }
    
}
