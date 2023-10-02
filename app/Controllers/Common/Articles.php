<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Article;

class Articles extends BaseController
{
    public function index()
    {
        if(!session('logged_in')){
            $message = "<div class='alert alert-danger' role='alert'>Veuillez vous identifier !</div>";
            echo view('login_page', array('special_message' => $message));
        }
        else{   

            $user_list = new Article();
            $data['liste_articles'] = $user_list->get_list_articles();

            $action = $this->request->getPost('action');
            
            if($action === 'editer')
            {
                $validation_rules = array(
                    'Nom_article' => [
                        'label'  => "Veuillez saisir le nom de l'article",
                        'rules'  => 'permit_empty|min_length[3]',
                        'errors' => [
                            'min_length' => "Le code doit contenir plus de 3 charateres"
                        ],
                    ],
                    'file' => [
                        'permit_empty',
                        'is_image[file]',
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
                    'quantité_article' => [
                        'label'  => "Veuillez saisir la quantité de l'article",
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => "Veuillez saisir la quantité",
                            'numeric' => "Veuillez saisir la quantité",
                        ],
                    ],
                    
                );

                if( $this->validate($validation_rules) === false )
                {
                    $method = $this->request->getMethod();
                    switch( $method ){
                        case 'post':
                            echo view('admin/articles_list',$data, array('validation' => $this->validator));
                            break;
                        case 'get':
                            $message = $this->session->getFlashdata('special_message');
                            echo view('admin/articles_list',$data, array('special_message' => $message));
                            break;
                        default:
                            die('something is wrong here');
                    }
    
                }

                $articleModel = new Article();

                $article_name = $this->request->getPost('Nom_article',FILTER_SANITIZE_STRING);
                $article_price = $this->request->getPost('prix_unitaire',FILTER_SANITIZE_NUMBER_INT);
                $article_quantity = $this->request->getPost('quantité_article',FILTER_SANITIZE_NUMBER_INT);
                $article_image = $this->request->getFile('file');
                $product_id = $this->request->getPost('id_produit',FILTER_SANITIZE_NUMBER_INT);
                
                $array = [];

                if($article_image->isValid()){
                    $newName = $article_image->getRandomName();
                    $article_image->move('./uploads', $newName);
                    $url = base_url().'uploads'.'/'.$newName;
                    $array['image_produit'] = $url;
                }
                
                if (!empty($article_name)) {
                    $array['nom_produit'] = $article_name;
                }
                
                if (!empty($article_price)) {
                    $array['prix_unitaire'] = $article_price;
                }
                if (!empty($article_quantity)) {
                    $stock_quantity = $articleModel->article_quantity($product_id);
                    (int)$new_stock_quantity = (int)$stock_quantity + (int)$article_quantity;
                    $array['quantité'] = $new_stock_quantity;
                }
        
                $articles_details = $articleModel->update_articles_data($product_id, $array);
        
                /*if( is_null($articles_details) )
                {
                    $message = "<div class='alert alert-danger' role='alert'>La mise à jour n'à pas été éffecuté. Merci de reésayer</div>";
                    echo view('admin/articles_list',$data, array('special_message' => $message));
                    return;
                }
                else {
                    $message = "<div class='alert alert-success' role='alert'>Mise éffecuté.</div>";
                    echo view('admin/articles_list',$data, array('special_message' => $message));
                    return;
                }*/
                //$updated = $userModel->update_data(session('user_id'), $data);
        
            }

            elseif($action === 'supprimer')
            {
                $articleModel = new Article();

                $product_id = $this->request->getPost('id_produit',FILTER_SANITIZE_NUMBER_INT);
                $delete_product = $articleModel->delete_article($product_id);
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
                'prix_unitaire'=>$article_price,
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
