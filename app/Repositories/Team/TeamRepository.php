<?php 
namespace App\Repositories\Team;
use App\Models\Teams;
use App\Models\TeamsMembers;
use App\Repositories\Organization\OrganizationRepository;

class TeamRepository implements ITeamRepository{
    
    private $teamModel;

    public function __construct(Teams $teamModel){
        $this->teamModel = $teamModel;
    }

    public function getOrganizationTeams($organization_slug){
        $this->teamModel =  $this->teamModel->whereHas('organization', function($query) use($organization_slug){
            $query->where('organizations.slug', $organization_slug);
        });
        $search = request()->input('pesquisar');
        $this->teamModel = $this->teamModel->when($search, function($query) use($search){
            return $query->where('name','LIKE','%'.$search.'%');
        });
        return $this->teamModel->paginate();
    }

    public static function getTeamBySlug($slug){
        return Teams::where('slug',$slug)->first();
    }
    public function getByUser($user_id){
        return $this->teamModel->with('members')->whereHas('members', function($query) use($user_id){
            $query->where('teams_members.user_id',$user_id);
        })->paginate();
      
    }
    public static function find($team_id){
        return Teams::find($team_id);
    }

    public function storeTeam($team){
        $team['organization_id'] = OrganizationRepository::getOrganizationBySlug(request()->slug)->id;
        $this->teamModel->fill($team);
        $this->teamModel->setSlug($team['name']);
        $this->teamModel->save();
        return true;
    }
    public function addMember($user_id,$team_id){
        return TeamsMembers::create([
            'user_id' => $user_id,
            'teams_id' => $team_id
        ]);
       
    }
    public function deleteMember($user_id,$team_id){
        return TeamsMembers::where('user_id', $user_id)->where('teams_id' , $team_id)->delete();
       
    }
    public function updateTeam($team, $oldTeam){
       
        $oldTeam->update($team);
        return true;
    }
    public function deleteteTeam($id){
       
        return $this->teamModel->find($id)->delete();
    }

}

