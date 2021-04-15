<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Organization\IOrganizationRepository;
use App\Repositories\Organization\OrganizationRepository;
use App\Http\Requests\SendInvite;
use App\Http\Requests\EditTeam;
use Illuminate\Support\Facades\Storage;
use App\Models\Teams;
use App\Models\Organization;
use App\Models\User;


class MembersController extends Controller
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
    public function index($slug)
    {
        $organization = $this->organizationRepository->getOrganizationBySlug($slug);

        $members = User::with(['organizations_member' => function($query) use ($organization) {   
            $query->where('organizations_members.organization_id', $organization['id'])->select(['type', 'organization_id','organizations_members.user_id']);
        }])->whereHas('organizations_member',function($query) use ($slug) {
            $query->where('slug',$slug);
        })->get();

        $data['members'] = $members;
       
        return $this->view_organization('system/members/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_organization('system/teams/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SendInvite $request,$slug)
    {     
        try{
            $user_email = $request->validated()['email'];
            $user = User::where('email',$user_email)->first();
            $organization = $this->organizationRepository->getOrganizationBySlug($slug);
            $this->organizationRepository->inviteMember($user,$organization);

            return response(200);
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Teams $teams)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,Teams $team)
    {
        
        $data['team'] = $team;
        return $this->view_organization('system/teams/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update($slug,EditTeam $request, $team_id)
    {
        $oldTeam = TeamRepository::find($team_id);
        
      /*  if($request->user()->cannot('update',$oldOrganization)){
            
            abort(403);
        } */

        try{
     
            return redirect('painel/'.$slug.'/equipes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    public function update_member($slug,Request $request)
    {
        $member = $request->all();
        
      /*  if($request->user()->cannot('update',$oldOrganization)){
            
            abort(403);
        } */

        try{
            $this->organizationRepository->updateMember($member);
            return response(200);
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$user_id)
    {
        try{
            $organization = $this->organizationRepository->getOrganizationBySlug($slug);
            $this->organizationRepository->deleteteMember($organization->id,$user_id);
            return redirect('painel/'.request()->slug.'/membros');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }
}
