<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;
use App\Models\Alerte;

class StockAlerte extends BaseController
{
    public function index()
    {
        $alerte = new Alerte;
        $send_alerte = $alerte->getLowStockAlerts();
        if($send_alerte)
        {
            $email = \Config\Services::email();

                $fromEmail = getenv('EMAIL_FROM');
                $fromName = getenv('EMAIL_FROM_NAME');
                
                $email->setFrom($fromEmail , $fromName);
                $email->setTo('henocdesiretohouri@gmail.com');
                $email->setSubject('Alerte sur la quantité de stock');
                $message = '<html><body>';
                $message .= '<h2>Alerte sur la quantité de stock</h2>';
                $message .= '<p>Bonjour</p>';
                $message .= "<p>La quantité d'qrticle en stock est faible.</p>";
                $message .= "<p>Contactez le service technique de BEAUTY FASHION, si vous n'êtes pas à l'origine de cette demande.</p>";
                $message .= '</body></html>';

                $email->setMessage($message);
                
                if($email->send()){
                    //$message = "<div class='alert alert-success' role='alert'>MAIL ENVOYE</div>";
                    //echo view('admin/add_user', array('special_message' => $message));
                    //$form_manager->account_activation($token, $user_email);
                    return;
                    }
                else{
                    //$message = "<div class='alert alert-danger' role='alert'>MAIL NON ENVOYE </div>";
                    //echo view('admin/add_user', array('special_message' => $message));
                    return;
                }
        }
    }
}
