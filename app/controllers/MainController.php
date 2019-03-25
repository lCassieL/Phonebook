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
        $this->view->page = 'page_main_mycontact_view';
        $this->view->render();
    }
}