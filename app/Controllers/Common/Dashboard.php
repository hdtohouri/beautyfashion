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
                    'file' => [
                        'permit_empty',
                        'is_image[file]',
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[file,1024]',
                    ],
                    'number' => [
                        'label'  => 'Numero',
                        'rules'  => 'permit_empty|exact_length[13]',
                        'errors' => [
                            'exact_length' => 'Veuillez respecter le format',
                        ],
                    ],
                    'fullname' => [
                        'label'  => 'Nom Complet',
                        'rules'  => 'alpha_space',
                        'errors' => [
                            'alpha_space' => 'Merci de vérifier le Nom',
                        ],
                    ],
                    'email' => [
                        'label'  => 'Email Adresse',
                        'rules'  => 'permit_empty|valid_emails',
                        'errors' => [
                            'valid_emails' => 'Veuillez entrer une adresse email valide',
                        ],
                    ],
                    'adress' => [
                        'label'  => 'Entrer votre Adresse',
                        'rules'  => 'permit_empty|alpha_space',
                        'errors' => [
                            'alpha_space' => 'Merci de vérifier le Nom saisi',
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

            $profil_pic = $this->request->getFile('file');  
            $user_number = $this->request->getPost('number',FILTER_SANITIZE_NUMBER_INT);
            $user_email= $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
            $user_fullname = $this->request->getPost('fullname',FILTER_SANITIZE_STRING);
            $user_adress = $this->request->getPost('adress',FILTER_SANITIZE_STRING);
            
            $data = [];
            if (!empty($profil_pic)) {
                
                $old_pic = $userModel->get_old_pic(session('user_id'));
                $old_pic_path = $old_pic['user_details']['pic_profil'];
                $old_pic_name = basename($old_pic_path);
                
                $newName = $profil_pic->getRandomName();
                $profil_pic->move('./uploads', $newName);
                $remove = unlink('uploads/'.$old_pic_name);
                $url = base_url().'uploads'.'/'.$newName;
                $data['pic_profil'] = $url;
                
            }

            if (!empty($user_number)) {
                $data['user_number'] = $user_number;
            }
            
            if (!empty($user_fullname)) {
                $data['full_name'] = $user_fullname;
            }
            
            if (!empty($user_email)) {
                $data['user_email'] = $user_email;
            }
            
            if (!empty($user_adress)) {
                $data['user_adress'] = $user_adress;
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
