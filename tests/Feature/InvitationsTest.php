<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function non_owners_may_not_invite_users()
    {
        $project = ProjectFactory::create();

        $user = User::factory()->create();

        $assertInvitationsForbidden = function () use ($user, $project) {
            $this->actingAs($user)
                ->post($project->path().'/invitations')
                ->assertStatus(403);
        };

        $assertInvitationsForbidden();

        $project->invite($user);

        $assertInvitationsForbidden();
    }

    /** @test * */
    public function a_project_owner_can_invite_a_user()
    {
        $project = ProjectFactory::create();

        $user = User::factory()->create();

        $this->actingAs($project->owner)
            ->post($project->path().'/invitations', [
                'email' => $user->email
            ])
            ->assertRedirect($project->path());

        $this->assertTrue($project->members->contains($user));
    }

    /** @test * */
    public function the_email_address_must_be_associated_with_a_valid_birdboard_account()
    {
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path().'/invitations', [
                'email' => 'notauser@example.com'
            ])
            ->assertSessionHasErrors([
                'email' => 'The user you are inviting must have a Birdboard account.'
            ], null, 'invitations');
    }

    /** @test * */
    public function invited_users_may_update_project_details()
    {
        $project = ProjectFactory::create();

        $project->invite($newUser = User::factory()->create());

        $this->signIn($newUser);
        $this->post($project->path().'/tasks', $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}
