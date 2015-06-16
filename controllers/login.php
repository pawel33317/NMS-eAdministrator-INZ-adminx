<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();  
        $this->auth = new Auth();
        if ($this->auth->isAdminLogged())
            Header("Location: " . URL);
    }
    
    function index() {    
        $this->view->title = 'Panel administratora';
        $this->view->render('login/header');
        $this->view->render('login/index');
        $this->view->render('login/footer');
    }
    
    function beddata() {    
        $this->view->title = 'Panel administratora';
        $this->view->error = 'Złe dane.';
        $this->view->render('login/header');
        $this->view->render('login/index');
        $this->view->render('login/footer');
    }
    
    function run(){
        if (isset($_POST['admlogin'])) {
            $pass = $this->model->getPassword($_POST['admlogin'], 'login');

            if (!$pass) {
                Header("Location: " . URL . "login/beddata");
            } else {
                if ($pass == md5($_POST['admpassword'])) {
                    $id = $this->model->getUserID($_POST['admlogin']);
                    $this->auth->logInAdmin($id,md5($_POST['admpassword']));
                    Header("Location: " . URL);
                } else {
                    Header("Location: " . URL . "login/beddata");
                }
            }
        }else{
            Header("Location: " . URL . "login/beddata");
        }

        $this->model->run();
    }
    

}