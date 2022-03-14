<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Errors extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('/'));
    }

    function noscript(){
        return view('e/noscript');
    }
}
