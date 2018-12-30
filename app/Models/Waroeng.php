<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Waroeng
 * 
 * @property int $waroeng_id
 * @property int $waroeng_area_id
 * @property string $waroeng_nama
 * @property string $waroeng_alamat
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
	protected $primaryKey = 'waroeng_id';

	protected $casts = [
		'waroeng_area_id' => 'int'
	];

	protected $fillable = [
		'waroeng_area_id',
		'waroeng_nama',
		'waroeng_alamat'
	];

	public function area()
	{
		return $this->belongsTo(\App\Models\Area::class, 'waroeng_area_id');
	}

	public function komplains()
	{
		return $this->hasMany(\App\Models\Komplain::class, 'komplain_waroeng_id');
	}
}
