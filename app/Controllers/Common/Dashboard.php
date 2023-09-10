<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;

class Dashboard extends BaseController 
{
    public function index()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{
            return view("dashboard");
        }
        
    }

    public function produit()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("produit");
        }
    }

    public function compte()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("user_info");
        }
    }

    public function parametre()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{
                $validation_rules = array(
                    'fullname' => [
                        'label'  => 'Nom Complet',
                        'rules'  => 'string',
                        'errors' => [
                            'string' => 'Merci de vérifier le Nom',
                        ],
                    ],
                    'name' => [
                        'label'  => "Nom d'utilisateur",
                        'rules'  => 'permit_empty|alpha',
                        'errors' => [
                            'alpha' => "Merci de vérifier le nom d'utilisateur",
                        ],
                    ],
                    'email' => [
                        'label'  => 'Email Adresse',
                        'rules'  => 'permit_empty|valid_emails',
                        'errors' => [
                            'valid_emails' => 'Veuillez entrer une adresse email valide',
                        ],
                    ],
                );
                if( $this->validate($validation_rules) === false )
                {
                    $method = $this->request->getMethod();
                    switch( $method ){
                        case 'post':
                            echo view('parametre', array('validation' => $this->validator));
                            break;
                        case 'get':
                            $message = $this->session->getFlashdata('special_message');
                            echo view('parametre', array('special_message' => $message));
                            break;
                        default:
                            die('something is wrong here');
                    }
                    return;
                }
                $userModel = new User();

            $user_name = $this->request->getPost('name',FILTER_SANITIZE_STRING);
            $user_email= $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
            $user_fullname = $this->request->getPost('fullname',FILTER_SANITIZE_STRING);
            $data = [];
            
            if (!empty($user_fullname)) {
                $data['full_name'] = $user_fullname;
            }
            
            if (!empty($user_email)) {
                $data['user_email'] = $user_email;
            }

            if (!empty($user_name)) {
                $data['user_name'] = $user_name;
            }
            
            $updated = $userModel->update_data(session('user_id'), $data);
        
            if ($updated) 
            { 
                $message = "<div class='alert alert-success' role='alert'>Mise à Jour éffectuée.</div>";
                echo view('parametre', array('special_message' => $message));
                $this->session->set($data);
                return;
            }

            else
            {
                $this->session()->getTempdata('error','Une erreur est survenue. Merci de reésayer.',6 );
                $message = "<div class='alert alert-danger' role='alert'>Une erreur est survenue. Merci de reésayer</div>";
                echo view('parametre', array('special_message' => $message));
                return;
            }
        }
    }

    public function update_password()
    {
        $validation_rules = array(
            'password1' => [
                'label'  => 'Entrer le nouveau password',
                'rules'  => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Veuillez entrer le nouveau mot de passe',
                    'min_length' =>  'Le mot de passe doit contenir minimum 5 charactères',
                ],
			],
			'password2' => [
                'label'  => 'Ressaisir le nouveau password',
                'rules'  => 'required|matches[password1]',
                'errors' => [
                    'required' => 'Veuillez ressaisir le nouveau mot de passe',
                    'matches' =>  'Le mot de passe saisi ne correspond pas',
                ],
            ],
        );
        
        if( $this->validate($validation_rules) === false )
        {
            $method = $this->request->getMethod();
            switch( $method ){
                case 'post':
                    echo view('common_update_password', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('common_update_password', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        $userModel = new User();
         
        $newpassword = $this->request->getPost('password1',FILTER_SANITIZE_STRING);
        $password_updated = $userModel->update_user_password(session('user_id'), $newpassword);
        if (is_null($password_updated)) 
        { 
            $message = "<div class='alert alert-danger' role='alert'>Une erreur est survenue. Merci de reésayer</div>";
            echo view('common_update_password', array('special_message' => $message));
            return;
            
        }

        else
	    {
	        $message = "<div class='alert alert-success' role='alert'>Mise à Jour éffectuée.</div>";
            echo view('common_update_password', array('special_message' => $message));
        }
    }

    public function stock()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("stock_view");
        }
    }

    public function rapports()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("rapports_view");
        }
    }
    
}
