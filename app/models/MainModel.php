<?php

class MainModel extends Model{
    public function getUsers(){
        if($this->db->connect_errno===0){
            $query = 'select * from contacts';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
    public function getEmails(){
        if($this->db->connect_errno===0){
            $query = 'select emails.contact_id, emails.email from emails where emails.publish = "yes"';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getNumbers(){
        if($this->db->connect_errno===0){
            $query = 'select phones.contact_id, phones.phone from phones where phones.publish = "yes"';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getUser($id){
        if($this->db->connect_errno === 0){
            $query = 'select * from contacts where contacts.id ='.$id;
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getEmail($id){
        if($this->db->connect_errno === 0){
            $query = 'select emails.email, emails.publish from emails where emails.contact_id ='.$id;
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getPhone($id){
        if($this->db->connect_errno === 0){
            $query = 'select phones.phone, phones.publish from phones where phones.contact_id ='.$id;
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
}