<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Dec 2018 09:14:26 +0000.
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
 * @package App\Models
 */
class Area extends Eloquent
{
	protected $table = 'area';
	protected $primaryKey = 'area_id';

	protected $fillable = [
		'area_nama'
	];
}
