<?php
class Users_model extends CI_Model
{
    function check($login, $password)
    {
        if(empty($login) OR empty($password))
        {
            return FALSE;
        }

        $result = $this->db->select('id')
                            ->from('dos_users')
                            ->where('login', $login)
                            ->where('password', $password)
                            ->limit(1)
                            ->get()
                            ->row();
        return $result ? $result->id : FALSE;
    } 

    function add($login, $password, $email)
    {
        if(empty($login) OR empty($password) OR empty($email))
        {
            return FALSE;
        }

        $result = $this->db->select('id')
                    ->from('dos_users')
                    ->where('email', $email)
                    ->limit(1)->get()->row_array();

        if ($result)
        {
            return FALSE;
        }
        $this->db->set('login', $login)->set('password', $password)->set('email', $email);
        return $this->db->insert('dos_users');
    }

    function get_visits($id)
    {
        if(empty($id))
        {
            return FALSE;
        }

        return $this->db->select('datetime')
                        ->from('dos_users_visits')
                        ->where('user_id', $id)
                        ->order_by('datetime', 'DESC')->limit(5)->get()->result();
    }

    function get_by_id($id)
    {
        if(empty($id))
        {
            return FALSE;
        }

        return $result = $this->db->select('id')
                            ->from('dos_users')
                            ->where('id', $id)
                            ->limit(1)
                            ->get()
                            ->row();
    }

    function add_visit($id)
    {
        if(empty($id))
        {
            return FALSE;
        }

        $this->db->set('user_id', $id)->set('datetime', date("Y-m-d H:i:s"));
        return $this->db->insert('dos_users_visits');
    }
}