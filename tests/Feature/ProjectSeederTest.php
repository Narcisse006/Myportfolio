<?php

namespace Tests\Feature;

use App\Models\Project;
use Database\Seeders\ProjectSeeder;
use Tests\TestCase;

class ProjectSeederTest extends TestCase
{
    public function test_seeder_does_not_republish_a_hidden_project(): void
    {
        $this->seed(ProjectSeeder::class);

        $project = Project::query()->where('title', 'TimeLux')->first();
        $this->assertNotNull($project);
        $this->assertTrue($project->is_published);

        $project->update(['is_published' => false]);

        $this->seed(ProjectSeeder::class);

        $this->assertFalse($project->fresh()->is_published);
    }
}
