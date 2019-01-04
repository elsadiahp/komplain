<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 Jan 2019 16:42:24 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Waroeng
 * 
 * @property int $waroeng_id
 * @property string $waroeng_nama
 * @property string $waroeng_alamat
 * @property int $area_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Area $area
 * @property \Illuminate\Database\Eloquent\Collection $komplains
 *
 * @package App\Models
 */
class Waroeng extends Eloquent
{
	protected $table = 'waroeng';
	protected $primaryKey = 'waroeng_id';

	protected $casts = [
		'area_id' => 'int'
	];

	protected $fillable = [
		'waroeng_nama',
		'waroeng_alamat',
		'area_id'
	];

	public function area()
	{
		return $this->belongsTo(\App\Models\Area::class);
	}

	public function komplains()
	{
		return $this->hasMany(\App\Models\Komplain::class);
	}
}
