<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Jan 2019 03:49:00 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbKategori
 * 
 * @property int $id_kategori
 * @property int $id_kategori_parent
 * @property int $bagian_id
 * @property string $nama_kategori
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Bagian $bagian
 * @property \App\Models\TbKategori $tb_kategori
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
 * @property \Illuminate\Database\Eloquent\Collection $tb_kategoris
 *
 * @package App\Models
 */
class TbKategori extends Eloquent
{
	protected $table = 'tb_kategori';
	protected $primaryKey = 'id_kategori';

	protected $casts = [
		'id_kategori_parent' => 'int',
		'bagian_id' => 'int'
	];

	protected $fillable = [
		'id_kategori_parent',
		'bagian_id',
		'nama_kategori'
	];

	public function bagian()
	{
		return $this->belongsTo(\App\Models\Bagian::class);
	}

	public function tb_kategori()
	{
		return $this->belongsTo(\App\Models\TbKategori::class, 'id_kategori_parent');
	}

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class, 'id_kategori');
	}

	public function tb_kategoris()
	{
		return $this->hasMany(\App\Models\TbKategori::class, 'id_kategori_parent');
	}
}
