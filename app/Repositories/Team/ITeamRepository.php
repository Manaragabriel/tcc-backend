<?php 
namespace App\Repositories\Team;


interface ITeamRepository{
    public function getOrganizationTeams($slug);
    public static function find($team_id);
    public function storeTeam($team);
    public function updateTeam($team,$oldTeam);
    public function deleteteTeam($id);
}











