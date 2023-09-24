<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;

class AdminDashboard extends BaseController
{
    public function index()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{
            return view("admin/admin_dashboard");
        }
        
    }

    public function adminproduit()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("admin/mesproduit");
        }
    }

    public function compteadmin()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
            return view("admin/moncompte");
        }
    }

    public function adminparametre()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{
            $validation_rules = array(
                'name' => [
                    'label'  => "Nom d'utilisateur",
                    'rules'  => 'permit_empty|alpha',
                    'errors' => [
                        'alpha' => "Merci de vérifier le nom d'utilisateur",
                    ],
                ],
                'fullname' => [
                    'label'  => 'Nom Complet',
                    'rules'  => 'string',
                    'errors' => [
                        'string' => 'Merci de vérifier le Nom',
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
                        echo view('admin/adminparametre', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('admin/adminparametre', array('special_message' => $message));
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
                echo view('admin/adminparametre', array('special_message' => $message));
                $this->session->set($data);
            }

            else
            {
                $message = "<div class='alert alert-danger' role='alert'>Une erreur est survenue. Merci de reésayer</div>";
                echo view('admin/adminparametre', array('special_message' => $message));
                return;
            }
        }
    }

    public function list_user()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{   

            $userModel = new User();
            $data['liste_user'] = $userModel->get_list();
            
            $action = $this->request->getPost('action');

            if($action === 'desactivate')
            {
                $user_id = $this->request->getPost('user_id');
                $desactivate = $userModel->desactivate_user($user_id);
            }
            elseif($action === 'activate')
            {
                $user_id = $this->request->getPost('user_id');
                $activate = $userModel->activate_user($user_id);
            }

            elseif($action === 'delete')
            {
                $user_id = $this->request->getPost('user_id');
                $delete = $userModel->delete_user($user_id);
            }
            
            return view("admin/user_list", $data);
        }
    }
    
    public function desactivate_user()
    {
        $userModel = new User();
        $user_id = $this->request->getPost('user_id');
        $desactivate = $userModel->desactivate_user($user_id);
        return redirect()->to('admin/user_list');
    }
    public function modify_password()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{     
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
                        echo view('admin/common_modify_password', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('admin/common_modify_password', array('special_message' => $message));
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
                echo view('admin/common_modify_password', array('special_message' => $message));
                return;
                
            }
    
            else
            {
                $message = "<div class='alert alert-success' role='alert'>Mise à Jour éffectuée.</div>";
                echo view('admin/common_modify_password', array('special_message' => $message));
            }
        }
    }

    public function admin_add_users()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else
        {
            $validation_rules = array(
                'Username' => [
                    'label'  => "Veuillez saisir le Username de l'utilisateur",
                    'rules'  => 'required|min_length[3]|is_unique[users.user_name]',
                    'errors' => [
                        'required' => 'Veuillez saisir le Username',
                        'is_unique'=>"Un utilisateur avec cet nom d'utilisateur existe deja",
                        'min_length'=>"Le nom d'utilisateur doit contenir plus de 3 lettres",
                    ],
                ],
                'email' => [
                    'label'  => 'Email Adresse',
                    'rules'  => 'valid_emails|required|is_unique[users.user_email]',
                    'errors' => [
                        'valid_emails' => 'Veuillez entrer une adresse email valide',
                        'required' => 'Veuillez saisir le mail',
                        'is_unique' => 'Un utilisateur avec cette adresse mail existe deja',
                    ],
                ],
                'password' => [
                    'label'  => "Veuillez saisir le Mot de Passe de l'utilisateur",
                    'rules'  => 'required|min_length[4]|max_length[10]',
                    'errors' => [
                        'required' => 'Veuillez saisir le mot de passe',
                    ],
                ],
            );
            
            if( $this->validate($validation_rules) === false )
            {
                $method = $this->request->getMethod();
                switch( $method ){
                    case 'post':
                        echo view('admin/add_user', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('admin/add_user', array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }
    
                $user_email= $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
                $form_name = $this->request->getPost('Username',FILTER_SANITIZE_STRING);
                $form_pwd = strtoupper(hash('sha256',$this->request->getPost('password')));
            $data = [
                'user_name'=>$form_name,
                'user_pwd'=>$form_pwd,
                'user_email'=>$user_email,
            ];
          
            $form_manager = new User(); 
    
            $user_details = $form_manager->insert_in_db($data);
    
            if( is_null($user_details) )
            {
                $message = "<div class='alert alert-danger' role='alert'>L'ajout de l'utilisateur n'a pas été éffecuté. Merci de reésayer</div>";
                echo view('admin/add_user', array('special_message' => $message));
                return;
            }
            else {
                $message = "<div class='alert alert-success' role='alert'>L'ajout de l'utilisateur a bien été pris en compte</div>";
                echo view('admin/add_user', array('special_message' => $message));

                $email = \Config\Services::email();

                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($user_email);   
                $token = bin2hex(random_bytes(30));
                $email->setSubject('Activation de compte');
                $message = '<html><body>';
                $message .= '<h2>Activation de compte</h2>';
                $message .= '<p>Bonjour</p>';
                $message .= '<p>Votre compte Beautyfashion à été créé avec succès.</p>';
                $message .= "<p>Veuillez Cliquer sur le bouton ci dessous pour l'activer.</p>"; 
                $message .= '<a href= "'.base_url().'common/login/activation/'.$token.'">ACTIVER MON COMPTE</a>';
                $message .= "<p>Contactez le service technique de BEAUTY FASHION, si vous n'êtes pas à l'origine de cette demande.</p>";
                $message .= '</body></html>';

                $email->setMessage($message);
                
                if($email->send()){
                    //$message = "<div class='alert alert-success' role='alert'>MAIL ENVOYE</div>";
                    //echo view('admin/add_user', array('special_message' => $message));
                    $form_manager->account_activation($token, $user_email);
                    return;
                    }
                else{
                    //$message = "<div class='alert alert-danger' role='alert'>MAIL NON ENVOYE </div>";
                    //echo view('admin/add_user', array('special_message' => $message));
                    return;
                }

                //return;
            }
        }
    }

    public function commandes()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{

            $validation_rules = array(
                'category_article' => [
                    'label'  => "Veuillez saisir le Username de l'utilisateur",
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Veuillez saisir le Username',
                    ],
                ],/*
                'prix' => [
                    'label'  => "Prix de l'article",
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'numeric' => 'le prix ne peut contenir que des chiffres',
                        'required' => 'Veuillez saisir le prix',
                    ],
                ],
                'Quantité' => [
                    'label'  => "Veuillez saisir la quantité",
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => 'Veuillez saisir la quantité',
                        'numeric' => 'le quantité ne peut contenir que des chiffres',
                    ],
                ],*/
                'date' => [
                    'label'  => "Date de la commande",
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Veuillez sélectionner la date',
                    ],
                ],/*
                'Total' => [
                    'label'  => "Montant Total",
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => 'Veuillez saisir le mot de passe',
                        'numeric' => 'le total ne peut contenir que des chiffres',
                    ],
                ],*/
            );

            $user_list = new User();
            $data['liste_articles'] = $user_list->get_list_articles();
            
            if( $this->validate($validation_rules) === false )
            {
                $method = $this->request->getMethod();
                switch( $method ){
                    case 'post':
                        echo view('admin/nouvelle_commande', $data, ['validation' => $this->validator]);
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('admin/nouvelle_commande', $data, ['special_message' => $message]);
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }
            
            $article_name= $this->request->getPost('category_article',FILTER_SANITIZE_STRING);
            var_dump($article_name);
            //$article_prix = $this->request->getPost('prix',FILTER_SANITIZE_NUMBER_INT);
            //var_dump($article_prix);
            //$article_quantité= $this->request->getPost('Quantité',FILTER_SANITIZE_NUMBER_INT);
            //var_dump($article_quantité);
            $commande_date = $this->request->getPost('date');
            var_dump($commande_date);
            //$total= $this->request->getPost('Total',FILTER_SANITIZE_NUMBER_INT);
            //var_dump($total);

            //return view("admin/nouvelle_commande",$data);
        }
    }

}
