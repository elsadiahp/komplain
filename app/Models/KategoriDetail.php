<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Dec 2018 06:47:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KategoriDetail
 * 
 * @property int $kategori_detail_id
 * @property string $kategori_detail_nama
 * @property int $id_kategori
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TbKategori $tb_kategori
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
 *
 * @package App\Models
 */
class KategoriDetail extends Eloquent
{
	protected $table = 'kategori_detail';
	protected $primaryKey = 'kategori_detail_id';

	protected $casts = [
		'id_kategori' => 'int'
	];

	protected $fillable = [
		'kategori_detail_nama',
		'id_kategori'
	];

	public function tb_kategori()
	{
		return $this->belongsTo(\App\Models\TbKategori::class, 'id_kategori');
	}

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class);
	}
}
