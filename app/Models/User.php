<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class User extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';
    protected $returnType = 'array';
    protected $allowedFields = ['user_name','user_pwd'];


    public function insert_in_db($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function get_permissions($user_name,$password)
    {
        $builder = $this->db->table('users');
        $builder->select('user_id,user_name,user_pwd, full_name,user_email,user_status,level');
        $builder->where('user_name', $user_name);
        $builder->where('user_pwd', strtoupper(hash('SHA256',$password)));
        $result = $builder->get();
        $user_details = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {  
            return  ['user_details'=>$user_details]; 
        }
    }

    public function get_connected_with_code($code)
    {
        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->select('user_id,user_name,user_pwd, full_name,user_email,user_pwd,user_status,level');
        $builder->where('code', $code);
        $result = $builder->get();
        $user_details = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
             
            return  ['user_details' => $user_details]; 
        }
    }

    public function verifyEmail($email){
        $builder = $this->db->table('users');
        $builder->select('user_id,user_name,user_status');
        $builder->where('user_email', $email);
        $result = $builder->get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return ['row' => $row]; 
        }
        else
        {
            return false;
        }
    }

    public function update_data($id, $data)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $id);

        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $builder->set($key, $value);
            }
        }
        
        $builder->update();

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function retrievePassword($email){
        $builder = $this->db->table('users');
        $builder->select('user_id,full_name,user_pwd');
        $builder->where('user_email', $email);
        $result = $builder->get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return ['row' => $row]; 
        }
    }

    public function account_activation($activation_token,$email){
        $builder = $this ->db->table('users');
        $builder->where('user_email', $email);
        $now = new Time('now');
        $formattedDate = $now->format('Y-m-d H:i:s');
        $builder->update(['activation_token'=> $activation_token,'activation_time'=> $formattedDate ]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function verifyActivation_token($token){
        $builder = $this->db->table('users');
        $builder->select('user_id, user_name, activation_time');
        $builder->where('activation_token', $token);
        $result = $builder -> get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return $row['activation_time']; 
        }
        else
        {
            return false;
        }
    }

    public function checkActivationTime($time){
        $update_time = strtotime($time);
        $current_time = time();
        $time_diff = (($current_time - $update_time) / 60);
        if ($time_diff < 20){
            return true;
        }
        else{
            return false;
        }
    }

    public function validate_AccountActivation($token)
    {
        $builder = $this->db->table('users');
        $builder->where('activation_token', $token);
        $builder->where('user_status', 'INACTIVE');
        $builder->update(['user_status' => 'ACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function updatetoken($token,$id,$code){
        $builder = $this ->db->table('users');
        $builder->where('user_id', $id);
        $now = new Time('now');
        $formattedDate = $now->format('Y-m-d H:i:s');
        $builder->update(['token'=> $token,'code'=> $code,'updated_at'=> $formattedDate ]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function verify_activation_statut($token){
        $builder = $this->db->table('users');
        $builder->select('user_id,full_name,user_status');
        $builder->where('activation_token', $token);
        $result = $builder->get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return $row['user_status']; 
        }
    }

    public function verifyToken($token){
        $builder = $this->db->table('users');
        $builder->select('user_id, user_name, updated_at');
        $builder->where('token', $token);
        $result = $builder -> get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return $row['updated_at']; 
        }
        else
        {
            return false;
        }
    }

    public function checkExpireDate($time){
        $update_time = strtotime($time);
        $current_time = time();
        $time_diff = (($current_time - $update_time) / 60);
        if ($time_diff < 10){
            return true;
        }
        else{
            return false;
        }
    }

    public function verifyCode($code){
        $builder = $this->db->table('users');
        $builder->select('code');
        $builder->where('code', $code);
        $result = $builder -> get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return $row['code']; 
        }
        else
        {
            return false;
        }
    }

    public function update_user_password($id,$password){
        $builder = $this ->db->table('users');
        $builder->where('user_id', $id);
        $builder->update(['user_pwd' => strtoupper(hash('SHA256',$password)), 'pwd_modification_flag' => 'YES']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function desactivate_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->where('user_status', 'ACTIVE'); 
        $builder->update(['user_status' => 'DESACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function activate_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->where('user_status', 'DESACTIVE'); 
        $builder->update(['user_status' => 'ACTIVE']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_user($user_id)
    {
        $builder = $this->db->table('users');
        $builder->where('user_id', $user_id);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function get_list()
    {
       $builder = $this->builder();
       $builder->select('user_id,user_name,full_name,user_status');
       $builder->where('level !=',  'admin');
       $builder = $this ->db->table('users');
       $builder->orderBy('user_id', 'DESC');
       return $this->findAll();
    }
}
