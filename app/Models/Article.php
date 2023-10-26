<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Article extends Model
{
    protected $table      = 'produits';
    protected $primaryKey = 'id_produit ';
    protected $returnType = 'array';
    protected $allowedFields = ['nom_produit','quantité'];


    public function insert_in_db($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('users');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_articles_data($id, $data)
    {
        $builder = $this->db->table('produits');
        $builder->where('id_produit', $id);

        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $builder->set($key, $value);
            }
        }
        
        $builder->update();

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function add_articles($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('produits');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function add_commandes($data)
    {
        $builder = $this->builder();
        $builder = $this->db->table('orders');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }				
    
    public function article_quantity($id)
    {
        $builder = $this->db->table('produits');
        $builder->select('id_produit, nom_produit, quantité');
        $builder->where('id_produit', $id);
        $result = $builder -> get();
        $row = $result->getRowArray();
        if(count($result->getResultArray())== 1)
        {
            return $row['quantité']; 
        }
        else
        {
            return false;
        } 

    }

    public function update_quantity($id,$quantity)
    {
        $builder = $this->db->table('produits');
        $builder->select('id_produit, nom_produit, quantité');
        $builder->where('id_produit', $id);
        $builder->update(['quantité' => $quantity]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_article($product_id)
    {
        $builder = $this->db->table('produits');
        $builder->where('id_produit', $product_id);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function get_list_articles()
    {
        $builder = $this->db->table('produits');
        $builder->select('id_produit, nom_produit, quantité, image_produit, prix_unitaire'); 
        $builder->orderBy('id_produit', 'DESC');
        return $builder->get()->getResult();
    }

    function get_articles_total()
    {
        $builder = $this->db->table('produits')->selectSum('quantité', 'totalQuantite')->get();
        $result = $builder->getRowArray();
        return isset($result['totalQuantite']) ? $result['totalQuantite'] : 0;
    } 

    function get_orders_total()
    {
        $builder = $this ->db->table('orders')->countAllResults();
        return isset($builder) ? $builder : 0;
    } 


    function get_commandes_liste()
    {
        $builder = $this->db->table('orders');
        $builder->select('orders.id_produit, orders.update_at, orders.quantité_article, orders.total, produits.nom_produit');
        $builder->join('produits', 'produits.id_produit  = orders.id_produit', 'left');
        $builder->orderBy('orders.id', 'DESC');
        $builder->limit(12); 
        return $builder->get()->getResult();
    } 

    function get_total_commandes()
    {
        $builder = $this->db->table('orders');
        $builder->select('orders.id_produit, orders.update_at, orders.quantité_article, orders.total, produits.nom_produit');
        $builder->join('produits', 'produits.id_produit  = orders.id_produit', 'left');
        $builder->orderBy('orders.id', 'DESC');
        return $builder->get()->getResult();
    } 

    public function update_month_orders($id)
    {
        $builder = $this->db->table('month');
        $builder->select('month_id, month_name, nombre_ventes');
        $builder->where('month_id', $id);
        $builder->set('nombre_ventes', 'nombre_ventes+1', FALSE);
        $builder->update();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

}
