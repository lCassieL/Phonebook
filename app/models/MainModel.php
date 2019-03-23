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
}