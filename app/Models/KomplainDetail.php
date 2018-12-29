<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Dec 2018 06:47:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KomplainDetail
 * 
 * @property int $komplain_detail_id
 * @property int $komplain_id
 * @property int $kategori_detail_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\KategoriDetail $kategori_detail
 * @property \App\Models\Komplain $komplain
 *
 * @package App\Models
 */
class KomplainDetail extends Eloquent
{
	protected $table = 'komplain_detail';
	protected $primaryKey = 'komplain_detail_id';

	protected $casts = [
		'komplain_id' => 'int',
		'kategori_detail_id' => 'int'
	];

	protected $fillable = [
		'komplain_id',
		'kategori_detail_id'
	];

	public function kategori_detail()
	{
		return $this->belongsTo(\App\Models\KategoriDetail::class);
	}

	public function komplain()
	{
		return $this->belongsTo(\App\Models\Komplain::class);
	}
}
