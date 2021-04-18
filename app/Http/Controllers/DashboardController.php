<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return $this->view_default('system/dashboard/user');
    }

    public function organization(){
        return $this->view_organization('system/dashboard/index');
    }
}
