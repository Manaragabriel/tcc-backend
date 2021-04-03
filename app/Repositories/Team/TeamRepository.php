<?php 
namespace App\Repositories\Organization;
use App\Models\Organization;

class OrganizationRepository implements IOrganizationRepository{
    
    private $organizationModel;

    public function __construct(Organization $organizationModel){
        $this->organizationModel = $organizationModel;
    }

    public function getUserOrganizations(){
        return Organization::where('user_id',auth()->user()->id)->paginate();
    }

    public static function getOrganizationBySlug($slug){
        return Organization::where('slug',$slug)->first();
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

}

