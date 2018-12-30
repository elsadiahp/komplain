<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KomplainDetail
 * 
 * @property int $komplain_detail_id
 * @property int $komplain_detail_komplain_id
 * @property int $komplain_detail_kategori_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Kategori $kategori
 * @property \App\Models\Komplain $komplain
 *
 * @package App\Models
 */
class KomplainDetail extends Eloquent
{
	protected $primaryKey = 'komplain_detail_id';

	protected $casts = [
		'komplain_detail_komplain_id' => 'int',
		'komplain_detail_kategori_id' => 'int'
	];

	protected $fillable = [
		'komplain_detail_komplain_id',
		'komplain_detail_kategori_id'
	];

	public function kategori()
	{
		return $this->belongsTo(\App\Models\Kategori::class, 'komplain_detail_kategori_id');
	}

	public function komplain()
	{
		return $this->belongsTo(\App\Models\Komplain::class, 'komplain_detail_komplain_id');
	}
}
