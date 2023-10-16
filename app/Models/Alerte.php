<?php

namespace App\Models;

use CodeIgniter\Model;

class Alerte extends Model
{
    protected $table      = 'produits';
    protected $primaryKey = 'id_produit ';
    protected $returnType = 'array';
    protected $allowedFields = ['nom_produit','quantité'];

    public function stock_alerte($quantite)
    {
        $builder = $this->db->table('produits');
        $builder->select('id_produit, nom_produit, quantité');
        $builder->where('id_produit', $quantite);
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

    public function getLowStockAlerts()
    {
        return $this->db->table('stock_alerte')->get()->getResult();
    }

}
