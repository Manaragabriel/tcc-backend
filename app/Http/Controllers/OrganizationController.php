<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterOrganization;
use App\Http\Requests\EditOrganization;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Repositories\Organization\IOrganizationRepository;
use App\Repositories\Organization\OrganizationRepository;

class OrganizationController extends Controller
{
    private $organizationRepository;

    public function __construct(IOrganizationRepository $organizationRepository){
        $this->organizationRepository = $organizationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['organizations'] = $this->organizationRepository->getUserOrganizations();
        return $this->view_default('system/organizations/index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_default('system/organizations/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterOrganization $request)
    {
        try{
            $validOrganization = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/organizations/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                $validOrganization['image'] = $file_name;
                
            }
            $validOrganization['user_id'] = auth()->user()->id;
            $this->organizationRepository->storeOrganization($validOrganization);

            return redirect('painel/organizacoes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization, Request $request)
    {   
        if($request->user()->cannot('update',$organization)){
            abort(403);
        }
        $data['organization'] = $organization;
        return $this->view_default('system/organizations/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(EditOrganization $request,  $id)
    {
        $oldOrganization = Organization::where('id',$id)->first();
        
        if($request->user()->cannot('update',$oldOrganization)){
            
            abort(403);
        }

        try{
            $validOrganization = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/organizations/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                Storage::disk('local')->delete('public/thumbs/'.$oldOrganization['image']);
                $validOrganization['image'] = $file_name;
                
            }
            $this->organizationRepository->updateOrganization($validOrganization,$oldOrganization);
            return redirect('painel/organizacoes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $organization = Organization::find($id);
        if($request->user()->cannot('delete',$organization)){
            abort(403);
        }
        try{
            $this->organizationRepository->deleteteOrganization($id);
            return redirect('painel/organizacoes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }
}
