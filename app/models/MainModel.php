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
            $query = 'select contact_emails.contact_id, emails.name from contact_emails left outer join emails on contact_emails.email_id = emails.id left outer join contacts on contact_emails.contact_id = contacts.id where emails.publish = "yes"';
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
            $query = 'select contact_phone_numbers.contact_id, phone_numbers.number from contact_phone_numbers left outer join phone_numbers on contact_phone_numbers.phone_number_id = phone_numbers.id left outer join contacts on contact_phone_numbers.contact_id = contacts.id where phone_numbers.publish = "yes"';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }
}