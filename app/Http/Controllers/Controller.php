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
        $data['user_type'] = null;
        return view($view,$data);
    }

    protected function view_organization($view,$data = []){
        $data['organization_menu'] = true;       
        $data['organization'] = OrganizationRepository::getOrganizationBySlug(request()->slug);
        $data['organization_name'] = $data['organization']->name;
        $data['organization_slug'] = request()->slug;
        $data['user_type'] = OrganizationRepository::getUserType(auth()->user(),$data['organization']);
        return view($view,$data);
    }

    protected function generate_log($message){
        dd($message);
    }
}
