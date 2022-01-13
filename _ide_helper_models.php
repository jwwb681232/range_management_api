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
 * App\Models\Administrator
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Administrator whereUpdatedAt($value)
 */
	class Administrator extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Audio
 *
 * @property int $id
 * @property string $title 音频名称
 * @property string $description 描述
 * @property string $path 音频存放地址
 * @property int $size 字节
 * @property int $duration 时长(秒)
 * @property int $type 类型(1:Alarm,2:Explosion)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereUpdatedAt($value)
 */
	class Audio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $number 卡编号
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Query\Builder|Card onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Card withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Card withoutTrashed()
 */
	class Card extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $key
 * @property string $name
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mode
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereUpdatedAt($value)
 */
	class Mode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $key 唯一Key
 * @property string $name 名称
 * @property int $status 状态（0：禁用，1：启用）
 * @property string $description 描述
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RolePermission
 *
 * @property int $role_id
 * @property int $permission_id
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission whereRoleId($value)
 */
	class RolePermission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RtsScript
 *
 * @property int $id
 * @property string $range_name
 * @property int $index 脚本index
 * @property string $name 脚本名称
 * @property int $scenario_id 场景id
 * @property string $scenario_name 场景名称
 * @property array $steps 步骤
 * @property array $participants
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript query()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereRangeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereScenarioName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereSteps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereUpdatedAt($value)
 */
	class RtsScript extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Scenario
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $type 培训类型[1：Group,2：Individual]
 * @property int $rts_script_id 关联rts_scripts表id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Audio[] $audios
 * @property-read int|null $audios_count
 * @property-read \App\Models\RtsScript|null $rtsScript
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereRtsScriptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereUpdatedAt($value)
 */
	class Scenario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Unit
 *
 * @property int $id
 * @property string $name
 * @property int $status 状态(1:正常，0:禁用)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Query\Builder|Unit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Unit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Unit withoutTrashed()
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $nric 身份证号
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int $unit_id
 * @property int $card_id 卡id
 * @property int $status 状态(1:正常，0:禁用)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Card|null $card
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mode[] $modes
 * @property-read int|null $modes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Unit|null $unit
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

