<?php

class MainModel extends Model{
    public function getContacts(){
        if($this->db->connect_errno===0){
            $query = 'select contacts.id, contacts.name, contacts.surname, contacts.address, contacts.city , countries.name as country from contacts left outer join countries on contacts.country_id = countries.id';
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

    public function getPhones(){
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

    public function getCountries(){
        if($this->db->connect_errno === 0){
            $query = 'select * from countries';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getCountryId($name){
        if($this->db->connect_errno === 0){
            $query = 'select countries.id from countries where countries.name ="'.$name.'"';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function getContact($id){
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
            $query = 'select emails.id, emails.email, emails.publish from emails where emails.contact_id ='.$id;
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

    public function getUsers(){
        if($this->db->connect_errno === 0){
            $query = 'select * from users';
            $res = $this->db->query($query);
            if($res){
                return $res->fetch_all(MYSQLI_ASSOC);
            } else{
                return false;
            }
        }
    }

    public function updateContact($id, $name, $surname, $address, $city, $country_id){
        if($this->db->connect_errno === 0){
            $query = 'update contacts set name="'.$name.'", surname="'.$surname.'", address="'.$address.'", city="'.$city.'", country_id ='.$country_id.' where contacts.id ='.$id;
            $this->db->query($query);
        }
    }

    public function deletePhonesByCountryId($contact_id){
        if($this->db->connect_errno === 0){
            $query = 'delete from phones where contact_id ='.$contact_id;
            $this->db->query($query);
        }
    }

    public function deleteEmailsByCountryId($contact_id){
        if($this->db->connect_errno === 0){
            $query = 'delete from emails where contact_id ='.$contact_id;
            $this->db->query($query);
        }
    }
    
    public function addPhone($phone, $publish, $contact_id){
        if($this->db->connect_errno === 0){
            $query = 'insert into phones (phone, publish, contact_id) values("'.$phone.'","'.$publish.'",'.$contact_id.')';
            $this->db->query($query);
        }
    }

    public function addEmail($email, $publish, $contact_id){
        if($this->db->connect_errno === 0){
            $query = 'insert into emails (email, publish, contact_id) values("'.$email.'","'.$publish.'",'.$contact_id.')';
            $this->db->query($query);
        }
    }
}