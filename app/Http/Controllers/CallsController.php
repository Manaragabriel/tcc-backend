<?php

namespace App\Http\Controllers;

use App\Models\Calls;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterCall;
use App\Repositories\Organization\IOrganizationRepository;
use App\Repositories\Organization\OrganizationRepository;
use App\Repositories\Call\ICallRepository;
use App\Repositories\Call\CallRepository;
use App\Models\Organization;
use App\Repositories\Project\IProjectRepository;
class CallsController extends Controller
{

    private $callRepository;
    private $organizationRepository;
    private $projectRepository;

    public function __construct(ICallRepository $callRepository,IOrganizationRepository $organizationRepository,IProjectRepository $projectRepository){
        $this->callRepository = $callRepository;
        $this->organizationRepository = $organizationRepository;
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user_id = auth()->user()->id;
        $organization_id = $this->organizationRepository->getOrganizationBySlug($slug)->id;
        $data['calls'] =  $this->callRepository->getOrganizationsCalls($organization_id);
        $data['projects'] = $this->projectRepository->getOrganizationProjects($slug);
        $data['members'] =  Organization::with('members')->where('slug',$slug)->first()->members;
        return $this->view_organization('system/calls/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_organization('system/calls/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterCall $request,$slug)
    {
        try{
            $validCall = $request->validated();
            $validCall['user_id'] = auth()->user()->id;
            $validCall['organization_id'] = $this->organizationRepository->getOrganizationBySlug($slug)->id;
            $this->callRepository->storeCall($validCall);

            return redirect('painel/'.$slug.'/seus-chamados');
        }catch(\Exception $e){
            $this->generate_log($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calls  $calls
     * @return \Illuminate\Http\Response
     */
    public function show_user_calls($slug)
    {
        $user_id = auth()->user()->id;
        $organization_id = $this->organizationRepository->getOrganizationBySlug($slug)->id;
        $data['calls'] =  $this->callRepository->getUserCalls($organization_id,$user_id);
        return $this->view_organization('system/calls/show_user_calls',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calls  $calls
     * @return \Illuminate\Http\Response
     */
    public function edit(Calls $calls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calls  $calls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calls $calls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calls  $calls
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calls $calls)
    {
        //
    }
}
