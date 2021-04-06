<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Project\IProjectRepository;
use App\Repositories\Project\ProjectRepository;
use App\Http\Requests\RegisterProject;
use App\Http\Requests\EditProject;
use Illuminate\Support\Facades\Storage;
use App\Models\Projects;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $projectRepository;

    public function __construct(IProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['projects'] = $this->projectRepository->getOrganizationProjects(request()->slug);
        return $this->view_organization('system/projects/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_organization('system/projects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterProject $request)
    {
        $organization_slug = request()->slug;
        try{
            $validProjects = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/projects/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                $validProjects['image'] = $file_name;
                
            }
            $this->projectRepository->storeProject($validProjects);

            return redirect('painel/'.$organization_slug.'/projetos');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projectss  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projectss  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,Projects $project)
    {
        
        $data['project'] = $project;
        return $this->view_organization('system/projects/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projectss  $projects
     * @return \Illuminate\Http\Response
     */
    public function update($slug,EditProject $request, $project_id)
    {
        $oldProject = ProjectRepository::find($project_id);
        
      /*  if($request->user()->cannot('update',$oldOrganization)){
            
            abort(403);
        } */

        try{
            $validProject = $request->validated();
          
            if($request->hasFile('image')){
                $file_name = $request->file('image')->getClientOriginalName();
                $file_path = 'public/projects/'.$file_name;
                Storage::disk('local')->put($file_path, file_get_contents($request->file('image')));
                Storage::disk('local')->delete('public/projects/'.$oldProject['image']);
                $validProjects['image'] = $file_name;
                
            }
            $this->projectRepository->updateProject($validProject,$oldProject);
            return redirect('painel/'.$slug.'/projetos');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projectss  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        try{
            $this->projectRepository->deleteteProject($id);
            return redirect('painel/'.request()->slug.'/projetos');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }
}
