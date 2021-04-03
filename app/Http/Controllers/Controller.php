<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Organization\OrganizationRepository;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function view_default($view,$data = []){
        $data['organization_menu'] = false;
        $data['organization_name'] = '';
        return view($view,$data);
    }

    protected function view_organization($view,$data = []){
        $data['organization_menu'] = true;       
        $data['organization_name'] = OrganizationRepository::getOrganizationBySlug(request()->slug)['name'];
        return view($view,$data);
    }

    protected function generate_log($message){
        dd($message);
    }
}
