<?php
class MainController extends Controller{
    public function action_index(){
        $this->model = new MainModel();
        $this->view->users = $this->model->getUsers();
        $this->view->page = 'page_main_index_view';
        $this->view->render();
    }
}