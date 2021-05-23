<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Repositories\Organization\OrganizationRepository;
use App\Models\Organization;
use Mockery;
class OrganizationRepoTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->eloquent = Mockery::mock('Eloquent');
        $this->organization = Mockery::mock('App\Models\Organization');
        $this->organization->shouldReceive('fill')->shouldReceive('setSlug')->shouldReceive('save')->once()->andReturnSelf();
        $this->repo = new OrganizationRepository($this->organization);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_store()
    {
       
        $data = [
            'name' => 'Test',
            'cnpj' => '34.307.880/0001-61',
            'description' => 'This is a description',
            'user_id' => 1,
        ];
        $this->assertTrue($this->repo->storeOrganization($data));
    }

   /* public function test_update()
    {
        $oldOrganization = $this->repo->getOrganizationBySlug('test');
        $data = [
            'name' => 'Test atualizado',
            'cnpj' => '34.307.880/0001-63',
            'description' => 'This is a description updated',
            'user_id' => 1,
        ];
        $this->assertTrue($this->repo->updateOrganization($data,$oldOrganization));
    } */
}
