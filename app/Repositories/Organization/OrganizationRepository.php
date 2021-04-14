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
    public function deleteteOrganization($id){
        return $this->organizationModel->find($id)->delete();
    }

    public function deleteteMember($organization_id, $user_id){
       return OrganizationsMembers::where('organization_id',$organization_id)->where('user_id',$user_id)->first()->delete();
    }

}

