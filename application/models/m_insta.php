<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_insta extends CI_Model {

	public function getUser($username,$password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user')->result();
        return $query;
    }

    public function getPhoto($username){
        $this->db->where('username', $username);
        $query = $this->db->get('photo')->result();
        return $query;
    }

    public function getProfile($username){
        $this->db->where('username', $username);
        $query = $this->db->get('profile')->row();
        return $query;
    }

    public function editProfile($username,$data)
	{
		$this->db->where('username', $username);
		$this->db->update('profile', $data);
    }
    
    public function searchPhoto($caption){
        $this->db->like('caption', $caption);
        $query = $this->db->get('photo')->result();
        return $query;
    }

    public function exploreUser($username){
        $this->db->query("SELECT * FROM profile WHERE NOT username ='".$username."'");
        $query = $this->db->get('profile')->result();
        return $query;
    }

    public function photo($url,$caption)
    {
        $username = $this->session->username;
		$data = [
            "username" => $username,
            "url" => $url,
            "caption" => $caption,
            "likes" => 0,
		];
		$this->db->insert('photo', $data);
    }
}
