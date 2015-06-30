<?php

class Auth  extends Controller{
    function __construct() {
        parent::__construct();
        parent::loadModel('auth');
    }

    public function handleLogin() {
        if(!$this->isAdminLogged())
            Header("Location: " . URL . "login");
      /*  @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../login');
            exit;
        }*/
    }

    public function logInAdmin($userID, $adminPassMd5) {
        setcookie("admlogin", $userID, time() + 360000, '/');
        setcookie("admpassword", $adminPassMd5, time() + 360000, '/');
    }

    public function isAdminLogged(){
        if (isset($_COOKIE['admlogin'])) {
            $pass = $this->model->getPassword($_COOKIE['admlogin']);
            if ($pass) {
                if ($pass == $_COOKIE['admpassword']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    
    
    public function logout(){
        setcookie('admlogin',"",time()-36000,'/');
        setcookie('admpassword',"",time()-36000,'/');
	header('Location: '.URL);
    }
    /*
    public function logInUser($userID, $userPassMd5){
        setcookie("user_id", $userID, time() + 360000,'/');
        setcookie("user_pass", $userPassMd5, time() + 360000,'/');
    }

    public function isDeviceRegistered($mac) {
        $user = $this->model->getUserByDevice($mac);
        if ($user) {
            $this->logInUser($user['user_id'], $user['user_pass']);
            return $user;
        } else {
            return false;
        }
    }

    public function getUserData($id) {
       return $this->model->getUserData($id);   
    }
    */
}
