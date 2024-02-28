<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kind
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stack> $stacks
 * @property-read int|null $stacks_count
 * @method static \Database\Factories\KindFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kind newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kind newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kind query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kind whereUpdatedAt($value)
 */
	class Kind extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Link
 *
 * @property string $id
 * @property string $link_type_id
 * @property string $project_id
 * @property string|null $title
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LinkType $link_type
 * @property-read \App\Models\Project $project
 * @method static \Database\Factories\LinkFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereLinkTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUrl($value)
 */
	class Link extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LinkType
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Link> $links
 * @property-read int|null $links_count
 * @method static \Database\Factories\LinkTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkType whereUpdatedAt($value)
 */
	class LinkType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property array|null $photo
 * @property string $summary
 * @property string|null $description
 * @property bool $published
 * @property int $stage_id
 * @property int $category_id
 * @property string|null $content
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Link> $links
 * @property-read int|null $links_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stack> $stacks
 * @property-read int|null $stacks_count
 * @property-read \App\Models\Stage $stage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Type> $types
 * @property-read int|null $types_count
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stack
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $kind_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kind $kind
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\StackFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Stack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stack query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereKindId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stack whereUpdatedAt($value)
 */
	class Stack extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stage
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\StageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stage whereUpdatedAt($value)
 */
	class Stage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Database\Factories\TypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 */
	class Type extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \Filament\Models\Contracts\FilamentUser {}
}

