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
            //var_dump($data);
            
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
                    'label'  => "Veuillez saisir le Username de l'utilisateur",
                    'rules'  => 'required|min_length[3]',
                    'errors' => [
                        'required' => "Veuillez saisir le Nom de l'article",
                        'exact_length' => "Le code doit contenir plus de 3 charateres"
                    ],
                ],
                'file' => [
                    'required',
                    'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[file,1024]',
                    'errors' => [
                        'required' => "Veuillez selectionner l'image du produit",
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
                ]
                
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
                $article_quantity = $this->request->getPost('quantité_article',FILTER_SANITIZE_STRING);
                //$article_category = $this->request->getPost('category',FILTER_SANITIZE_STRING);

                $newName = $article_image->getRandomName();
                $article_image->move('./uploads', $newName);
                $url = base_url().'uploads'.'/'.$newName;

            $data = [
                'nom_produit'=>$article_name,
                'image_produit'=>$url,
                'quantité'=>$article_quantity,
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
