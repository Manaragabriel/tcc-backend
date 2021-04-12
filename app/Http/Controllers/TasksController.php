<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterTask;
use App\Repositories\Task\ITaskRepository;
class TasksController extends Controller
{
    
    private $taskRepository;
    private $projectRepository;

    public function __construct(ITaskRepository $taskRepository,IProjectRepository $projectRepository){
        $this->taskRepository = $taskRepository;
        $this->projectRepository = $projectRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterTask $request,$slug,$project)
    {
        try{
            $validTask = $request->validated();
            $validTask['project_id'] = $this->projectRepository->getProjectBySlug($project)->id;
            $this->taskRepository->storeTask($validTask);
            return response(200);
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
            return response(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$project,$id)
    {
        try{
            $this->taskRepository->deleteTask($id);
            return redirect('painel/'.request()->slug.'/projetos/'.$project.'/kanban');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }
}
