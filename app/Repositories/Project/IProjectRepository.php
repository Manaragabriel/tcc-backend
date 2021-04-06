<?php 
namespace App\Repositories\Project;


interface IProjectRepository{
    public function getOrganizationProjects($slug);
    public static function find($project_id);
    public function storeProject($team);
    public function updateProject($project,$oldProject);
    public function deleteteProject($id);
}











