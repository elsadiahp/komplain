<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 09:53:57 +0000.
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
