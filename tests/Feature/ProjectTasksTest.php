<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function guests_cannot_add_tasks_to_projects()
    {
        $project = Project::factory()->create();

        $this->post($project->path().'/tasks')
            ->assertRedirect('/login');
    }

    /** @test **/
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = Project::factory()->create();

        $this->post($project->path().'/tasks', $attributes = ['body' => 'Test task'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $attributes);
    }


    /** @test **/
    public function only_the_owner_of_a_project_may_update_a_task()
    {
        $this->signIn();

        $project = ProjectFactory::withTasks(1)->create();

        $this->patch($project->tasks->first()->path(), $attributes = ['body' => 'Changed'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $attributes);
    }

    /** @test **/
    public function a_project_can_have_tasks()
    {
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path().'/tasks', $attributes = ['body' => 'Test task']);

        $this->get($project->path())
            ->assertSee($attributes['body']);
    }

    /** @test **/
    public function a_task_can_be_updated()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), $attributes = [
                'body' => 'Changed'
            ]);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test **/
    public function a_task_can_be_completed()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), $attributes = [
                'body' => 'Changed',
                'completed' => true
            ]);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test **/
    public function a_task_can_be_marked_as_incomplete()
    {
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), $attributes = [
                'body' => 'Changed',
                'completed' => true
            ]);

        $this->patch($project->tasks->first()->path(), $attributes = [
            'body' => 'Changed',
            'completed' => false
        ]);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test **/
    public function a_task_requires_a_body()
    {
        $project = ProjectFactory::create();

        $attributes = Task::factory()->raw(['body' => '']);

        $this->actingAs($project->owner)
            ->post($project->path().'/tasks', $attributes)
            ->assertSessionHasErrors('body');
    }
}
