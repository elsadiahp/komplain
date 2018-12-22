<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 22 Dec 2018 02:28:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KomplainDetail
 * 
 * @property int $komplain_detail_id
 * @property int $id_kategori
 * @property int $komplain_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TbKategori $tb_kategori
 * @property \App\Models\Komplain $komplain
 *
 * @package App\Models
 */
class KomplainDetail extends Eloquent
{
	protected $table = 'komplain_detail';
	protected $primaryKey = 'komplain_detail_id';

	protected $casts = [
		'id_kategori' => 'int',
		'komplain_id' => 'int'
	];

	protected $fillable = [
		'id_kategori',
		'komplain_id'
	];

	public function tb_kategori()
	{
		return $this->belongsTo(\App\Models\TbKategori::class, 'id_kategori');
	}

	public function komplain()
	{
		return $this->belongsTo(\App\Models\Komplain::class);
	}
}
