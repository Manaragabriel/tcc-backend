<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function view_default($view,$data = []){
        $data['organization_menu'] = false;
        return view($view,$data);
    }

    protected function view_organization($view,$data = []){
        $data['organization_menu'] = true;
        return view($view,$data);
    }

    protected function generate_log($message){
        dd($message);
    }
}
