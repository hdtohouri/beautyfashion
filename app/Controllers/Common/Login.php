<?php namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{

    public function index()
    {
        $validation_rules = array(
            'UserName' => [
                'label'  => "Nom d'utilisateur",
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre nom d'utilisateur",
                ],
            
            ],
            'UserPwd' => [
                'label'  => 'Mot de passe', 
                'rules'  => 'required',
                'errors' => [
                    'required' => "Veuillez saisir votre mot de passe",
                ],
                
            ]
        );
        
	    if( $this->validate($validation_rules) === false )
        {
            $method = $this->request->getMethod();
            switch( $method ){
                case 'post':
                    echo view('login_page', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('login_page', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

        
	    $form_user_name = $this->request->getPost('UserName',FILTER_SANITIZE_STRING);
	    $form_pwd = $this->request->getPost('UserPwd');
	    $login_manager = new User();

        $user_details = $login_manager->get_permissions($form_user_name, $form_pwd);
        
        if (is_null($user_details)) 
        {
            $message = "<div class='alert alert-danger' role='alert'>Nom d'utilisateur ou Mot de passe invalide Veuillez réessayer</div>";
            echo view('login_page', array('special_message' => $message));
            return;
            
        }else{ 
            
            if($user_details['user_details']['user_status'] === 'DESACTIVE')
            {   
                $message ="<div class='alert alert-danger' role='alert' >Votre Compte a été désactivé. Veuillez contacter la présidence de Beauty Fashion pour sa réactivation!</div>";
                echo view('login_page', array('special_message' => $message));
            }
            else if($user_details['user_details']['level'] === 'user')
            {
                $data = [
                    'user_id' =>  $user_details['user_details']['user_id'],
                    'user_name' =>  $user_details['user_details']['user_name'],
                    'full_name' =>  $user_details['user_details']['full_name'],
                    'logged_in' => true,
                    'email_address' =>  $user_details['user_details']['user_email'],
                    'numero' =>  $user_details['user_details']['user_number'],
                    'pic_profil' =>  $user_details['user_details']['pic_profil'],
                    'adresse' =>  $user_details['user_details']['user_adress'],
                    'level' =>  $user_details['user_details']['level']
                ];
                
                $this->session->set($data);
                return redirect()->to(base_url('common/dashboard'));
            }
            else if($user_details['user_details']['level'] === 'admin')
            {
                $data = [
                    'user_id' =>  $user_details['user_details']['user_id'],
                    'user_name' =>  $user_details['user_details']['user_name'],
                    'full_name' =>  $user_details['user_details']['full_name'],
                    'logged_in' => true,
                    'email_address' =>  $user_details['user_details']['user_email'],
                    'numero' =>  $user_details['user_details']['user_number'],
                    'pic_profil' =>  $user_details['user_details']['pic_profil'],
                    'adresse' =>  $user_details['user_details']['user_adress'],
                    'level' =>  $user_details['user_details']['level']
                ];
                
                $this->session->set($data);
                return redirect()->to(base_url('common/admindashboard'));
            }
            else if($user_details['user_details']['level'] === 'admin')
            {
                $data = [
                    'user_id' =>  $user_details['user_details']['user_id'],
                    'user_name' =>  $user_details['user_details']['user_name'],
                    'full_name' =>  $user_details['user_details']['full_name'],
                    'logged_in' => true,
                    'email_address' =>  $user_details['user_details']['user_email'],
                    'numero' =>  $user_details['user_details']['user_number'],
                    'pic_profil' =>  $user_details['user_details']['pic_profil'],
                    'adresse' =>  $user_details['user_details']['user_adress'],
                    'level' =>  $user_details['user_details']['level']
                ];
                
                $this->session->set($data);
                return redirect()->to(base_url('common/superadmindashboard'));
            }
        }

    }

    public function register()
	{
        $validation_rules = array(
            'Name' => [
                'label'  => 'Saisir Votre Nom Complet',
                'rules'  => 'required|min_length[3]'
            ],
            'email' => [
                'label'  => 'Saisir votre email',
                'rules'  => 'required|is_unique[users.user_email]|valid_emails'
            ],
            'UserName' => [
                'label'  => "Nom d'utilisateur",
                'rules'  => 'required|min_length[3]|max_length[10]'
            ],
            'UserPwd' => [
                'label'  => 'Mot de passe',
                'rules'  => 'required|min_length[4]|max_length[10]'
            ]
        );
        
	    if( $this->validate($validation_rules) === false )
        {
            $method = $this->request->getMethod();
            switch( $method ){
                case 'post':
                    echo view('inscription_screen', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('inscription_screen', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }

            $form_name = $this->request->getPost('Name',FILTER_SANITIZE_STRING);
            $form_email= $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
            $form_user_name = $this->request->getPost('UserName',FILTER_SANITIZE_STRING);
            $form_pwd = strtoupper(hash('sha256',$this->request->getPost('UserPwd')));
        $data = [
            'full_name'=>$form_name,
            'user_email'=>$form_email,
            'user_name'=>$form_user_name,
            'user_pwd'=>$form_pwd,
        ];
	  
	    $form_manager = new User();

	    $user_details = $form_manager->insert_in_db($data);

        if( is_null($user_details) )
	    {
	        $message = "<div class='alert alert-danger' role='alert'>L'inscription n'a pas été éffecutée. Merci de reésayer</div>";
            echo view('inscription_screen', array('special_message' => $message));
            return;
        }
        else {
            $message = "<div class='alert alert-success' role='alert'>Votre inscription a bien été pris en compte</div>";
            echo view('inscription_screen', array('special_message' => $message));
            return;
            $this->session->set($data);
            return redirect()->to(base_url('inscription_screen'));
        }
	}

    public function forgotten_password()
    {   
         $validation_rules = array(
        'email' => ['label'  => "Veuillez saisir votre adresse email", 'rules'  => 'required|valid_email'],
        );
        if( $this->validate($validation_rules) === false )
        {
            $method = $this->request->getMethod();
            switch( $method ){
                case 'post':
                    echo view('common_forgotten_password', array('validation' => $this->validator));
                    break;
                case 'get':
                    $message = $this->session->getFlashdata('special_message');
                    echo view('common_forgotten_password', array('special_message' => $message));
                    break;
                default:
                    die('something is wrong here');
            }
            return;
        }
        
        $user_email = $this->request->getPost('email',FILTER_SANITIZE_EMAIL);
        $user_model = new User();
        $userID = $user_model->verifyEmail($user_email);
        
        if ($userID > 0) 
        {   
            if($userID['row']['user_status'] == 'ACTIVE')
            {
                $name = $user_model->retrievePassword($user_email);
                $email = \Config\Services::email();

                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                $email->setFrom($fromEmail , $fromName);
                $email->setTo($user_email);    
                $code = bin2hex(random_bytes(3));   
                $token = bin2hex(random_bytes(30));
                $email->setSubject('Demande de récuperation de mot de passe');
                $message = '<html><body>';
                $message .= '<h2>Demande de récuperation de mot de passe</h2>';
                $message .= '<p>Bonjour <b>'.$name['row']['full_name'].'</b>,</p>';
                $message .= '<p>Une demande de récuperation de mot de passe a été demandé pour votre compte.</p>';
                $message .= '<p>Le code pour vous connecter à votre compte est <b>'.$code.'</b></p>'; 
                $message .= '<p>Une fois connecté vous pourrez changer votre mot de passe.</p>'; 
                $message .= '<p>Cliquez sur le bouton pour terminer la procédure.</p>'; 
                $message .= '<a href= "'.base_url().'/common/login/reset_password/'.$token.'">Se Connecter</a>';
                $message .= "<p>Contactez le service technique de BEAUTY FASHION, si vous n'êtes pas à l'origine de cette demande.,</p>";
                $message .= '</body></html>';
                $email->setMessage($message);
                
                if($email->send()){
                    $message = "<div class='alert alert-success' role='alert'>Le code pour vous conecter vous à été envoyé par mail. Il est valide pour 10 min</div>";
                    echo view('common_forgotten_password', array('special_message' => $message));
                    $user_model->updatetoken($token, $userID['row']['user_id'], $code);
                    return;
                    }
                else{
                    $message = "<div class='alert alert-danger' role='alert'>Une erreur est survenue, Veuillez réessayer</div>";
                    echo view('common_forgotten_password', array('special_message' => $message));
                    return;
                }
            }else { 
                $message ="<div class='alert alert-danger' role='alert' >Votre Compte a été désactivé. Veuillez contacter la présidence de Beauty Fashion pour sa réactivation!</div>";
                echo view('login_page', array('special_message' => $message));
                return;
            }
        } else { 
            $message = "<div class='alert alert-danger' role='alert'>Adresse Email non reconnu</div>";
            echo view('common_forgotten_password', array('special_message' => $message));
            return;
        }
        redirect()->to(current_url());
    }

    public function reset_password($token = null)
    {  
        $validation_rules = array(
            'code' => [
            'label'  => 'Veuillez saisir le code reçu par mail',
            'rules'  => 'required|exact_length[6]'
             ],
        );
       
        $user_model = new User();
        
        if(!empty($token)){
            if($update_time = $user_model->verifyToken($token)){
                if($expiration= $user_model->checkExpireDate($update_time)){
                    if ($this->validate($validation_rules) === false) {
                        $method = $this->request->getMethod();
                        
                        switch ($method) {
                            case 'post':
                                echo view('common_reset_password', [
                                    'token' => $token,
                                    'validation' => $this->validator
                                ]);
                                break;
                            case 'get':
                                $message = $this->session->getFlashdata('special_message');
                                echo view('common_reset_password', [
                                    'token' => $token,
                                    'special_message' => $message
                                ]);
                                break;
                            default:
                                die('something is wrong here');
                        }
                        
                        return;
                    }

                    $code = $this->request->getPost('code');
                    $connexion = $user_model->get_connected_with_code($code);
                    if(is_null($connexion)){
                        $message = "<div class='alert alert-danger' role='alert'>Code invalide veuillez réessayer</div>";
                        echo view('common_reset_password', array('special_message' => $message, 'token' => $token));
                        return;
                    }
                    else{ 
                        if($connexion['user_details']['level'] === 'user')
                        {
                            $data = [
                                'user_id' =>  $connexion['user_details']['user_id'],
                                'user_name' =>  $connexion['user_details']['user_name'],
                                'full_name' =>  $connexion['user_details']['full_name'],
                                'logged_in' => true,
                                'email_address' =>  $connexion['user_details']['user_email'],
                                'numero' =>  $connexion['user_details']['user_number'],
                                'pic_profil' =>  $connexion['user_details']['pic_profil'],
                                'adresse' =>  $connexion['user_details']['user_adress'],
                                'level' =>  $connexion['user_details']['level']
                            ];
                        
                            $this->session->set($data);
                            return redirect()->to(base_url('common/dashboard'));
                        }
                        elseif($connexion['user_details']['level'] === 'admin')
                        {
                            $data = [
                                'user_id' =>  $connexion['user_details']['user_id'],
                                'user_name' =>  $connexion['user_details']['user_name'],
                                'full_name' =>  $connexion['user_details']['full_name'],
                                'logged_in' => true,
                                'email_address' =>  $connexion['user_details']['user_email'],
                                'numero' =>  $connexion['user_details']['user_number'],
                                'pic_profil' =>  $connexion['user_details']['pic_profil'],
                                'adresse' =>  $connexion['user_details']['user_adress'],
                                'level' =>  $connexion['user_details']['level']
                            ];
    
                            $this->session->set($data);
                            return redirect()->to(base_url('common/admindashboard'));
                        }
                        elseif($connexion['user_details']['level'] === 'superadmin')
                        {
                            $data = [
                                'user_id' =>  $connexion['user_details']['user_id'],
                                'user_name' =>  $connexion['user_details']['user_name'],
                                'full_name' =>  $connexion['user_details']['full_name'],
                                'logged_in' => true,
                                'email_address' =>  $connexion['user_details']['user_email'],
                                'numero' =>  $connexion['user_details']['user_number'],
                                'pic_profil' =>  $connexion['user_details']['pic_profil'],
                                'adresse' =>  $connexion['user_details']['user_adress'],
                                'level' =>  $connexion['user_details']['level']
                            ];
                        
                            $this->session->set($data);
                            return redirect()->to(base_url('common/admindashboard'));
                        }
                    }
                }else{
                    $message = "<div class='alert alert-danger' role='alert'>Le lien de réinitialisation du mot de passe a expiré </div>";
                    return view('common_reset_password', array('error_message' => $message));
                }
            }else{
                $message = "<div class='alert alert-danger' role='alert'>Erreur, Utilisateur non reconnu</div>";
                return view('common_reset_password', array('error_message' => $message));
            }
        }else{
            $message = "<div class='alert alert-danger' role='alert'>Accès non authorisé</div>";
            return view('common_reset_password', array('error_message' => $message));
        }
    }

}
