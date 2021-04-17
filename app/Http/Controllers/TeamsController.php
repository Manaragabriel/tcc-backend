<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Team\ITeamRepository;
use App\Repositories\Team\TeamRepository;
use App\Http\Requests\RegisterTeam;
use App\Http\Requests\EditTeam;
use Illuminate\Support\Facades\Storage;
use App\Models\Teams;

class TeamsController extends Controller
{
    private $teamRepository;

    public function __construct(ITeamRepository $teamRepository){
        $this->teamRepository = $teamRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teams'] = $this->teamRepository->getOrganizationTeams(request()->slug);
        return $this->view_organization('system/teams/index',$data);
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
    public function store(RegisterTeam $request)
    {
        $organization_slug = request()->slug;
        try{
            $validTeam = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/teams/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                $validTeam['image'] = $file_name;
                
            }
            $this->teamRepository->storeTeam($validTeam);

            return redirect('painel/'.$organization_slug.'/equipes');
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
    public function show_user_teams()
    {
        $data['teams'] =  $this->teamRepository->getByUser(auth()->user()->id);
        return $this->view_default('system/users/show_user_teams',$data);
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
            $validTeam = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/teams/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                Storage::disk('local')->delete('public/teams/'.$oldTeam['image']);
                $validTeam['image'] = $file_name;
                
            }
            $this->teamRepository->updateTeam($validTeam,$oldTeam);
            return redirect('painel/'.$slug.'/equipes');
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
    public function destroy($slug,$id)
    {
        try{
            $this->teamRepository->deleteteTeam($id);
            return redirect('painel/'.request()->slug.'/equipes');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }
}
