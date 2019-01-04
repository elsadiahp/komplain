<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 Jan 2019 16:42:24 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $username
 * @property int $users_area_id
 * @property int $users_waroeng_id
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'users_area_id' => 'int',
		'users_waroeng_id' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'username',
		'users_area_id',
		'users_waroeng_id',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}

}
