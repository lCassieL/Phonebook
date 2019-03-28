<?php
class MainController extends Controller{
    public function action_index(){
        $this->model = new MainModel();
        $this->view->contacts = $this->model->getContacts();
        $this->view->emails = $this->model->getEmails();
        $this->view->phones = $this->model->getPhones();
        $this->view->page = 'page_main_index_view';
        $this->view->render();
    }

    public function action_login(){
        $this->view->page = 'page_main_login_view';
        $this->view->render();
    }

    public function action_mycontact(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $phones = [];
            $emails = [];
            foreach($_POST as $key=>$value){
                if($key[0] == 'p'){
                    $phones += array($key => $value);
                }
                if($key[0] == 'e'){
                    $emails += array($key => $value);
                }
            }

            $id = filter_input(INPUT_POST, 'id');
            $name = filter_input(INPUT_POST, 'name');
            $surname = filter_input(INPUT_POST, 'l_name');
            $address = filter_input(INPUT_POST, 'address');
            $city = filter_input(INPUT_POST, 'city');
            $country = filter_input(INPUT_POST, 'country');

            $this->model = new MainModel();
            $mas_country_id = $this->model->getCountryId($country);
            $country_id = $mas_country_id[0]['id'];
            
            $this->model->updateContact($id, $name, $surname, $address, $city, $country_id);
            $this->model->deletePhonesByCountryId($id);

            foreach($phones as $key=>$phone){
                if($_POST['_pub'.$key] == 'yes'){
                    $this->model->addPhone($phone,'yes',$id);
                }else{
                    $this->model->addPhone($phone,'no',$id);
                }
            }

            $this->model->deleteEmailsByCountryId($id);

            foreach($emails as $key=>$email){
                if($_POST['_pub'.$key] == 'yes'){
                    $this->model->addEmail($email,'yes',$id);
                }else{
                    $this->model->addEmail($email,'no',$id);
                }
            }
        } else{
            $this->model = new MainModel();
            $this->view->contact = $this->model->getContact(2);
            $this->view->email = $this->model->getEmail(2);
            $this->view->phone = $this->model->getPhone(2);
            $this->view->countries = $this->model->getCountries();
            $this->view->page = 'page_main_mycontact_view';
            $this->view->render();
        }
    }

    public function action_save(){
        // var_dump('it is save action!!!');
        // exit();
    }
}