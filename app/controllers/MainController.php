<?php
class MainController extends Controller{
    public function action_index(){
        $this->model = new MainModel();
        $this->view->users = $this->model->getUsers();
        $this->view->emails = $this->model->getEmails();
        $this->view->phones = $this->model->getNumbers();
        $this->view->page = 'page_main_index_view';
        $this->view->render();
    }

    public function action_login(){
        $this->view->page = 'page_main_login_view';
        $this->view->render();
    }

    public function action_mycontact(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            var_dump($_POST);
            exit();
            $this->action_save();
        } else{
            $this->model = new MainModel();
            $this->view->user = $this->model->getUser(2);
            $this->view->email = $this->model->getEmail(2);
            $this->view->phone = $this->model->getPhone(2);
            $this->view->page = 'page_main_mycontact_view';
            $this->view->render();
        }
    }

    public function action_save(){
        var_dump('it is save action!!!');
        exit();
    }
}