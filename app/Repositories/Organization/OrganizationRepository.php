<?php 
namespace App\Repositories\Organization;
use App\Models\Organization;
use App\Models\OrganizationsMembersInvites;
use App\Models\OrganizationsMembers;

class OrganizationRepository implements IOrganizationRepository{
    
    private $organizationModel;

    public function __construct(Organization $organizationModel){
        $this->organizationModel = $organizationModel;
    }

    public function getUserOrganizations(){
        return Organization::where('user_id',auth()->user()->id)->paginate();
    }
    public function getOrganizationMembers($slug){
        return 'ok';
        //return Organization::with('members')->where('slug',$slug)->get();
    }
    public static function getOrganizationBySlug($slug){
        return Organization::where('slug',$slug)->first();
    }

    public function getOrganizationsByMember($user_id){
        return Organization::with('members')->whereHas('members', function($query) use($user_id){
            $query->where('organizations_members.user_id',$user_id);
        })->paginate();
    }
    public static function getUserType($user,$organization){
        $member = OrganizationsMembers::where('user_id',$user->id)->where('organization_id',$organization['id'])->first();
        return isset($member->type) ? $member->type : null;
    }
    public function getUserInvites($user_id){
        return Organization::with('invites')->whereHas('invites', function($query) use($user_id){
            $query->where('organizations_members_invites.user_id',$user_id);
            $query->where('organizations_members_invites.accepted',null);
        })->paginate();
    }

    public function acceptUserInvite($invite_id){
        $invite = OrganizationsMembersInvites::find($invite_id);
        OrganizationsMembers::create([
            'organization_id' => $invite['organization_id'],
            'user_id' => $invite['user_id'],
        ]);
        $invite->update(['accepted' => true]);
        return true;
    }

    public function rejectUserInvite($invite_id){
        $invite = OrganizationsMembersInvites::find($invite_id)->update(['accepted' => false]);
        return true;
    }

    public function inviteMember($user,$organization){
        return OrganizationsMembersInvites::create([
            'organization_id' => $organization['id'],
            'user_id' => $user['id'],
        ]);
    }
    
    public function storeOrganization($organization){
        $this->organizationModel->fill($organization);
        $this->organizationModel->setSlug($organization['name']);
        $this->organizationModel->save();
        return true;
    }
    public function updateOrganization($organization, $oldOrganization){
        $oldOrganization->update($organization);
        return true;
    }

    public function updateMember($member){
        OrganizationsMembers::where('organization_id', $member['organization_id'])->where('user_id', $member['user_id'])->first()->update($member);
        return true;
    }

    public function deleteteOrganization($id){
        return $this->organizationModel->find($id)->delete();
    }

    public function deleteteMember($organization_id, $user_id){
       return OrganizationsMembers::where('organization_id',$organization_id)->where('user_id',$user_id)->first()->delete();
    }

}

