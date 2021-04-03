<?php 
namespace App\Repositories\Organization;


interface IOrganizationRepository{
    public function getUserOrganizations();
    public function storeOrganization($organization);
    public function updateOrganization($organization,$oldOrganization);
    public function deleteteOrganization($id);
}











