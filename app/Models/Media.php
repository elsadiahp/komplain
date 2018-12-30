<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Media
 * 
 * @property int $media_id
 * @property string $media_nama
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $komplains
 *
 * @package App\Models
 */
class Media extends Eloquent
{
	protected $table = 'medias';
	protected $primaryKey = 'media_id';

	protected $fillable = [
		'media_nama'
	];

	public function komplains()
	{
		return $this->hasMany(\App\Models\Komplain::class, 'komplain_media_id');
	}
}
