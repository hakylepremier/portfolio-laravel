<?php

namespace Tests\Feature\Livewire\Projects;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ProjectResource\Pages\CreateProject;
use App\Models\Category;
use App\Models\Project;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Livewire\Volt\Volt;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ProjectFormTest extends TestCase
{
  use RefreshDatabase;

  private User $user;

  private User $admin;

  private Stage $stage;

  private Category $category;

  // this is for setting up global setups in the testing class
  protected function setUp(): void
  {
    parent::setUp();

    Role::create(['name' => 'Super Admin']);

    $user = User::factory()->create([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
    ]);

    $user->assignRole('Super Admin');

    $this->admin = $user;
    $this->user = User::factory()->create();

    // $this->stage = Stage::create([
    //   'name' => 'In production'
    // ]);

    // $this->category = Category::create([
    //   'title' => 'Productivity',
    //   'slug' => Str::slug('Productivity'),
    // ]);

    // Project::factory()->create([
    //   'title' => 'test project',
    //   'category_id' => $this->category->id,
    //   'stage_id' => $this->stage->id,
    //   'published' => true
    // ]);
    // Project::factory()->create([
    //   'title' => 'test second',
    //   'category_id' => $this->category->id,
    //   'stage_id' => $this->stage->id,
    //   'published' => true
    // ]);
    // Project::factory()->create([
    //   'title' => 'Queen',
    //   'category_id' => $this->category->id,
    //   'stage_id' => $this->stage->id,
    //   'published' => true
    // ]);
  }

  public function test_admin_can_visit_projects_create_page(): void
  {
    $this->actingAs($this->admin);
    $this->get(ProjectResource::getUrl('create'))->assertSuccessful();
  }

  public function test_non_admin_cannot_visit_projects_create_page(): void
  {
    $this->actingAs($this->user);
    $this->get(ProjectResource::getUrl('create'))->assertForbidden();
  }

  public function test_projects_form_exists(): void
  {
    $component = Livewire::test(CreateProject::class)->assertFormExists();
  }

  public function test_projects_form_can_create_project(): void
  {
    $project = Project::factory()->make();

    $this->assertDatabaseMissing(Project::class, [
      'title' => $project->title,
      'summary' => $project->summary,
      'description' => $project->description,
      'category_id' => $project->category->id,
      'stage_id' => $project->stage->id,
      'published' => $project->published,
      'content' => $project->content,
      'order' => $project->order,
    ]);

    Livewire::test(CreateProject::class)->fillForm([
      'title' => $project->title,
      'slug' => Str::slug($project->title),
      'summary' => $project->summary,
      'description' => $project->description,
      'category_id' => $project->category->id,
      'stage_id' => $project->stage->id,
      'published' => $project->published,
      'content' => $project->content,
      'order' => $project->order,
    ])
      ->assertFormSet([
        'slug' => Str::slug($project->title),
      ])
      ->call('create')
      ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Project::class, [
      'title' => $project->title,
      'summary' => $project->summary,
      'description' => $project->description,
      'category_id' => $project->category->id,
      'stage_id' => $project->stage->id,
      'published' => $project->published,
      'content' => $project->content,
      'order' => $project->order,
    ]);
  }

  public function test_projects_form_slug_autoset_by_title(): void
  {
    $project = Project::factory()->make();

    Livewire::test(CreateProject::class)->fillForm([
      'title' => $project->title,
    ])
      ->assertFormSet([
        'slug' => Str::slug($project->title),
      ]);
  }

  public function test_projects_form_throws_error_for_validation_error(): void
  {
    // try {
    $component = Livewire::test(CreateProject::class)->fillForm([
      'title' => null,
      'slug' => null,
      'summary' => null,
      'category_id' => null,
      'stage_id' => null,
      'published' => null,
      'description' => 2,
      'content' => 2,
      'order' => 'no',
    ])
      ->call('create')
      ->assertHasFormErrors([
        'title' => 'required',
        'slug' => 'required',
        'summary' => 'required',
        'category_id' => 'required',
        'stage_id' => 'required',
        'published' => 'required',
        'description' => 'string',
        'content' => 'string',
        'order' => 'numeric',
      ]);

    // dump($component->failedRules());
    // dump($component->errors());
    //code...
    // } catch (\Throwable $th) {
    //   dump($th);
    // }
  }
}
