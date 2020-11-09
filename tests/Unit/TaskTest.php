<?php

namespace Tests\Unit;

// In due of Laravel 8, we must use the class below.
//use PHPUnit\Framework\TestCase;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function it_belongs_to_a_project()
    {
        $task = Task::factory()->create();

        $this->assertInstanceof(Project::class, $task->project);
    }

    /** @test */
    public function it_has_a_path()
    {
        $task = Task::factory()->create();

        $this->assertEquals('/projects/'.$task->project->id.'/tasks/'.$task->id, $task->path());
    }
}
