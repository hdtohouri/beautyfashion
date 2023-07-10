<?php

namespace App\Controllers\Common;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        session()->stop();
        session()->remove('isLoggedIn');
        //session()->destroy();
	    return redirect()->to(base_url());
    }
}
