<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 05 Jan 2019 12:36:47 +0700.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Area
 * 
 * @property int $area_id
 * @property string $area_nama
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $waroengs
 *
 * @package App\Models
 */
class Area extends Eloquent
{
	protected $table = 'area';
	protected $primaryKey = 'area_id';

	protected $fillable = [
		'area_nama'
	];

	public function waroengs()
	{
		return $this->hasMany(\App\Models\Waroeng::class);
	}
}
