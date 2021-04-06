<?php 
namespace App\Repositories\Project;
use App\Models\Projects;
use App\Repositories\Organization\OrganizationRepository;
class ProjectRepository implements IProjectRepository{
    
    private $projectModel;

    public function __construct(Projects $projectModel){
        $this->projectModel = $projectModel;
    }

    public function getOrganizationProjects($organization_slug){
        $this->projectModel =  $this->projectModel->whereHas('organization', function($query) use($organization_slug){
            $query->where('organizations.slug', $organization_slug);
        });
        return $this->projectModel->paginate();
    }

    public function getUserProjects(){
        return Projects::where('user_id',auth()->user()->id)->paginate();
    }

    public static function getProjectBySlug($slug){
        return Projects::where('slug',$slug)->first();
    }

    public static function find($project_id){
        return Projects::find($project_id);
    }

    public function storeProject($project){
        $project['organization_id'] = OrganizationRepository::getOrganizationBySlug(request()->slug)->id;
        $this->projectModel->fill($project);
        $this->projectModel->setSlug($project['title']);
        $this->projectModel->save();
        return true;
    }
    public function updateProject($organization, $oldProject){
        $oldProject->update($organization);
        return true;
    }
    public function deleteteProject($id){
        return $this->projectModel->find($id)->delete();
    }

}

