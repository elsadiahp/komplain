<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 09:53:57 +0000.
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

	public function komplain()
	{
		return $this->hasMany(\App\Models\Komplain::class);
	}
}
