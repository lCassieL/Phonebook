<?php
class MainController extends Controller{
    public function action_index(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $action = filter_input(INPUT_POST, 'action');
            if($action === 'logout'){
                $_SESSION['login'] = '';
                $_SESSOIN['id'] = '';
                session_destroy();
            }
        } 
            $this->model = new MainModel();
            $this->view->contacts = $this->model->getContacts();
            $this->view->emails = $this->model->getEmails();
            $this->view->phones = $this->model->getPhones();
            $this->view->page = 'page_main_index_view';
            $this->view->render();
        
    }

    public function action_login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $action = filter_input(INPUT_POST, 'action');
            if($action === 'login'){
                $login = filter_input(INPUT_POST, 'login');
                $password = filter_input(INPUT_POST, 'password');
                $this->model = new MainModel();
                $users = $this->model->getUsers();
                foreach($users as $user){
                    if($user['login'] === $login && $user['password'] === $password){
                        $_SESSION['login'] = $user['login'];
                        $_SESSION['id'] = $user['contact_id'];
                        break;
                    }
                }
                header('Location: ' . '/main/mycontact');
            }
        } else if($_SESSION['login']){
            header('Location: ' . '/main/mycontact');
        }    
        
            $this->view->page = 'page_main_login_view';
            $this->view->render();
       
    }

    public function action_mycontact(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $action = filter_input(INPUT_POST, 'action');
            if($action === 'save'){
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
                $contactPublish = filter_input(INPUT_POST, 'cPub');

                if($contactPublish !== 'yes'){
                    $contactPublish = 'no';
                }
                
                $this->model = new MainModel();
                $mas_country_id = $this->model->getCountryId($country);
                $country_id = $mas_country_id[0]['id'];
            
                $this->model->updateContact($id, $name, $surname, $address, $city, $country_id, $contactPublish);
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
                header('Location: ' . '/main/index');
            } else if($action === 'logout'){
                    $_SESSION['login'] = '';
                    $_SESSOIN['id'] = '';
                    session_destroy();
                    header('Location: ' . '/main/login');
            } 
        }else if(!$_SESSION['login']){
            header('Location: ' . '/main/login');
        }
            $this->model = new MainModel();
            $this->view->contact = $this->model->getContact(+$_SESSION['id']);
            $this->view->email = $this->model->getEmail(+$_SESSION['id']);
            $this->view->phone = $this->model->getPhone(+$_SESSION['id']);
            $this->view->countries = $this->model->getCountries();
            $this->view->page = 'page_main_mycontact_view';
            $this->view->render();
        
    }

}