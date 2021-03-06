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
 * @property string $title ????????????
 * @property string $description ??????
 * @property string $path ??????????????????
 * @property int $size ??????
 * @property int $duration ??????(???)
 * @property int $type ??????(1:Alarm,2:Explosion)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newQuery()
 * @method static \Illuminate\Database\Query\Builder|Audio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Audio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Audio withoutTrashed()
 */
	class Audio extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Camera
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $status
 * @property int $unit_type
 * @property int $unit_seq
 * @property string $channel_code
 * @property string $channel_name
 * @property int $channel_seq
 * @property int $channel_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Camera newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Camera newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Camera query()
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereChannelCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereChannelSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereChannelStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereUnitSeq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereUnitType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Camera whereUpdatedAt($value)
 */
	class Camera extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $number ?????????
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
 * App\Models\Door
 *
 * @property int $id
 * @property string $door_id
 * @property string $code
 * @property string $description
 * @property int $reader_no
 * @property string $controller_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Door newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Door newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Door query()
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereControllerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereDoorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereReaderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Door whereUpdatedAt($value)
 */
	class Door extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Light
 *
 * @property int $id
 * @property string $deck
 * @property int $number
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Light newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Light newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Light query()
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereDeck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Light whereUpdatedAt($value)
 */
	class Light extends \Eloquent {}
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
 * @property string $key ??????Key
 * @property string $name ??????
 * @property int $status ?????????0????????????1????????????
 * @property string $description ??????
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
 * @property string $machine_number
 * @property string $range_name
 * @property string $index ??????index
 * @property string $name ????????????
 * @property mixed $scenario_id ??????id
 * @property string $scenario_name ????????????
 * @property array $steps ??????
 * @property array $participants
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Camera[] $cameras
 * @property-read int|null $cameras_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Door[] $doors
 * @property-read int|null $doors_count
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript newQuery()
 * @method static \Illuminate\Database\Query\Builder|RtsScript onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript query()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereMachineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereRangeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereScenarioName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereSteps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScript whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|RtsScript withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RtsScript withoutTrashed()
 */
	class RtsScript extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RtsScriptCamera
 *
 * @property string $rts_script_index ??????rts_scripts???index
 * @property string $channel_code
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptCamera newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptCamera newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptCamera query()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptCamera whereChannelCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptCamera whereRtsScriptIndex($value)
 */
	class RtsScriptCamera extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RtsScriptDoor
 *
 * @property string $rts_script_index ??????rts_scripts???index
 * @property int $door_id
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptDoor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptDoor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptDoor query()
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptDoor whereDoorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RtsScriptDoor whereRtsScriptIndex($value)
 */
	class RtsScriptDoor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Scenario
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $light_detail
 * @property string $audio_detail
 * @property string $rts_script_detail
 * @property int $type ????????????[1???Group,2???Individual]
 * @property string $rts_script_index ??????rts_scripts???index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Audio[] $audios
 * @property-read int|null $audios_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Light[] $lights
 * @property-read int|null $lights_count
 * @property-read \App\Models\RtsScript|null $rtsScript
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newQuery()
 * @method static \Illuminate\Database\Query\Builder|Scenario onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereAudioDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereLightDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereRtsScriptDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereRtsScriptIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Scenario withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Scenario withoutTrashed()
 */
	class Scenario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Training
 *
 * @property int $id
 * @property int $type ????????????[1???Group,2???Individual,3???Manual Training,4???Remote Control Handset mode]
 * @property int $scenario_id ??????type=[1|2]??????????????????
 * @property string $rts_script_index ??????rts_scripts???index
 * @property string $start_at
 * @property string $end_at
 * @property string $firing_detail
 * @property int $total_hits
 * @property array|null $trainees
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RtsScript|null $rtsScript
 * @property-read \App\Models\Scenario|null $scenario
 * @method static \Illuminate\Database\Eloquent\Builder|Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training query()
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereFiringDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereRtsScriptIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTotalHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTrainees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUpdatedAt($value)
 */
	class Training extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Unit
 *
 * @property int $id
 * @property string $name
 * @property int $status ??????(1:?????????0:??????)
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
 * @property string $nric ????????????
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int $unit_id
 * @property int $card_id ???id
 * @property int $status ??????(1:?????????0:??????)
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

