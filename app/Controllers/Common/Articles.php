<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;

class Articles extends BaseController
{
    public function index()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{   

            $user_list = new User();
            $data['liste_articles'] = $user_list->get_list_articles();

            $action = $this->request->getPost('action');
            var_dump($action );
            if($action === 'editer')
            {
                //$user_id = $this->request->getPost('user_id');
                //$desactivate = $userModel->desactivate_user($user_id);

                $validation_rules = array(
                    'Nom_article' => [
                        'label'  => "Veuillez saisir le nom de l'article",
                        'rules'  => 'required|min_length[3]',
                        'errors' => [
                            'required' => "Veuillez saisir le Nom de l'article",
                            'min_length' => "Le code doit contenir plus de 3 charateres"
                        ],
                    ],
                    'file' => [
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[file,1024]',
                        'errors' => [
                            'uploaded' => "Le format d'image n'est pas pris en charge"
                        ],
                    ],
                    'prix_unitaire' => [
                        'label'  => "Veuillez saisir le prix unitaire de l'article",
                        'rules'  => 'permit_empty|numeric',
                        'errors' => [
                            'numeric' => "Veuillez saisir la quantité",
                        ],
                    ],
                    
                );

                if( $this->validate($validation_rules) === false )
                {
                    $method = $this->request->getMethod();
                    switch( $method ){
                        case 'post':
                            echo view('admin/articles_list', array('validation' => $this->validator));
                            break;
                        case 'get':
                            $message = $this->session->getFlashdata('special_message');
                            echo view('admin/articles_list', array('special_message' => $message));
                            break;
                        default:
                            die('something is wrong here');
                    }
                    return;
                }
                
                $userModel = new User();

                $article_name = $this->request->getPost('Nom_article',FILTER_SANITIZE_STRING);
                $article_image = $this->request->getFile('file');
                $article_price = $this->request->getPost('prix_unitaire',FILTER_SANITIZE_NUMBER_FLOAT);
                
                $newName = $article_image->getRandomName();
                $article_image->move('./uploads', $newName);
                $url = base_url().'uploads'.'/'.$newName;
                
                $data = [];
            
                
                if (!empty($article_name)) {
                    $data['nom_produit'] = $article_name;
                }
                
                if (!empty($article_image)) {
                    $data['image_produit'] = $url;
                }
                if (!empty($article_price)) {
                    $data['prix_unitaire'] = $article_price;
                }
                
                //$updated = $userModel->update_data(session('user_id'), $data);
        
            }

            elseif($action === 'supprimer')
            {
                $user_id = $this->request->getPost('user_id');
                $delete = $userModel->delete_user($user_id);
            }
            return view("admin/articles_list", $data);
        }
    }

    public function add_articles()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{   
            $validation_rules = array(
                /*'category_article' => [
                    'label'  => "Veuillez Selectionner la categorie",
                    'rules'  => 'required',
                    'errors' => [
                        'required' => "Veuillez selectionner une categorie",
                    ],
                ],*/
                'Nom_article' => [
                    'label'  => "Veuillez saisir le nom de l'article",
                    'rules'  => 'required|min_length[3]',
                    'errors' => [
                        'required' => "Veuillez saisir le Nom de l'article",
                        'min_length' => "Le code doit contenir plus de 3 charateres"
                    ],
                ],
                'file' => [
                    'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[file,1024]',
                    'errors' => [
                        'uploaded' => "Le format d'image n'est pas pris en charge"
                    ],
                ],
                'quantité_article' => [
                    'label'  => "Veuillez saisir la quantité de l'article",
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => "Veuillez saisir la quantité",
                        'numeric' => "Veuillez saisir la quantité",
                    ],
                ],
                'prix_unitaire' => [
                    'label'  => "Veuillez saisir le prix unitaire de l'article",
                    'rules'  => 'required|numeric',
                    'errors' => [
                        'required' => "Veuillez saisir le prix unitaire de l'article",
                        'numeric' => "Veuillez saisir la quantité",
                    ],
                ],
                
            );
            
            if( $this->validate($validation_rules) === false )
            {
                $method = $this->request->getMethod();
                switch( $method ){
                    case 'post':
                        echo view('admin/add_articles', array('validation' => $this->validator));
                        break;
                    case 'get':
                        $message = $this->session->getFlashdata('special_message');
                        echo view('admin/add_articles', array('special_message' => $message));
                        break;
                    default:
                        die('something is wrong here');
                }
                return;
            }
    
                $article_name = $this->request->getPost('Nom_article',FILTER_SANITIZE_STRING);
                $article_image = $this->request->getFile('file');
                $article_quantity = $this->request->getPost('quantité_article',FILTER_SANITIZE_NUMBER_INT);
                $article_price = $this->request->getPost('prix_unitaire',FILTER_SANITIZE_NUMBER_FLOAT);
                $article_category = $this->request->getPost('category',FILTER_SANITIZE_STRING);
                
                $newName = $article_image->getRandomName();
                $article_image->move('./uploads', $newName);
                $url = base_url().'uploads'.'/'.$newName;

            $data = [
                'nom_produit'=>$article_name,
                'image_produit'=>$url,
                'quantité'=>$article_quantity,
                'prix_unitaire_article'=>$article_price,
                //'id_category'=>$article_category,
            ];
          
            $form_manager = new User();
    
            $user_details = $form_manager->add_articles($data);
    
            if( is_null($user_details) )
            {
                $message = "<div class='alert alert-danger' role='alert'>L'ajout de l'article n'a pas été éffecuté. Merci de reésayer</div>";
                echo view('admin/add_articles', array('special_message' => $message));
                return;
            }
            else {
                $message = "<div class='alert alert-success' role='alert'>L'article bien été ajouté</div>";
                echo view('admin/add_articles', array('special_message' => $message));
                return;
            }
        }
    }
}
