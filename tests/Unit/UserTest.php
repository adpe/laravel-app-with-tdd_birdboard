<?php

namespace Tests\Unit;

use App\Models\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
// In due of Laravel 8, we must use the class below.
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_has_projects()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test **/
    public function a_user_has_accessible_projects()
    {
        $foo = $this->signIn();

        ProjectFactory::ownedBy($foo)->create();

        $this->assertCount(1, $foo->accessibleProjects());

        $bar = User::factory()->create();
        $baz = User::factory()->create();

        $project = tap(ProjectFactory::ownedBy($bar)->create())->invite($baz);

        $this->assertCount(1, $foo->accessibleProjects());

        $project->invite($foo);

        $this->assertCount(2, $foo->accessibleProjects());
    }
}
