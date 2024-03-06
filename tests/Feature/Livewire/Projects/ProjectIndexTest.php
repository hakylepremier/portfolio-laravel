<?php

namespace Tests\Feature\Livewire\Projects;

use App\Models\Project;
use App\Models\Stage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Volt\Volt;
use Tests\TestCase;

class ProjectIndexTest extends TestCase
{
    use RefreshDatabase;

    // this is for setting up global setups in the testing class
    protected function setUp(): void
    {
        parent::setUp();

        Project::factory()->create([
            'title' => 'test project',
            'published' => true
        ]);
        Project::factory()->create([
            'title' => 'test second',
            'published' => true
        ]);
        Project::factory()->create([
            'title' => 'Queen',
            'published' => true
        ]);
    }

    public function test_projects_index_can_render(): void
    {
        $component = Volt::test('projects.index');

        $component->assertSee('test project')->assertSee('test second')->assertSee('Queen');
    }

    public function test_projects_index_route_shows_all_projects(): void
    {
        $response = $this->get('/projects');

        $response->assertStatus(200)->assertSeeVolt('projects.index');
    }

    public function test_search_can_filter_projects_in_projects_index_component(): void
    {
        $component = Volt::test('projects.index')
            ->set('search', 'test');

        $component->assertSee('test project')->assertSee('test second')->assertDontSee('Queen');
    }

    public function test_project_route_with_search_url_param_filters_projects(): void
    {
        $response = $this->get('/projects?s=Queen');

        $response->assertDontSee('test project')->assertDontSee('test second')->assertSee('Queen');
    }
}
