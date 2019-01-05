<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 05 Jan 2019 12:36:48 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $username
 * @property int $users_waroeng_id
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Waroeng $waroeng
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
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
		'users_waroeng_id',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function waroeng()
	{
		return $this->belongsTo(\App\Models\Waroeng::class, 'users_waroeng_id');
	}

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
