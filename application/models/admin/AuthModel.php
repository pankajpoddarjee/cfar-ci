<?php
class AuthModel extends CI_Model
{

	public function login($email,$password){
        $data=array(
            'email'=>$email,
            'Password'=>$password
        );
        $query=$this->db->where($data);
        $login=$this->db->get('admin');
        if($login!=NULL){
            return $login->row();
        } 
        return false;
    }
}