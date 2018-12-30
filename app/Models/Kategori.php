<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Kategori
 * 
 * @property int $kategori_id
 * @property int $kategori_parent_id
 * @property int $kategori_bagian_id
 * @property string $kategori_bagian_nama
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Bagian $bagian
 * @property \App\Models\Kategori $kategori
 * @property \Illuminate\Database\Eloquent\Collection $kategoris
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
 *
 * @package App\Models
 */
class Kategori extends Eloquent
{
	protected $primaryKey = 'kategori_id';

	protected $casts = [
		'kategori_parent_id' => 'int',
		'kategori_bagian_id' => 'int'
	];

	protected $fillable = [
		'kategori_parent_id',
		'kategori_bagian_id',
		'kategori_bagian_nama'
	];

	public function bagian()
	{
		return $this->belongsTo(\App\Models\Bagian::class, 'kategori_bagian_id');
	}

	public function kategori()
	{
		return $this->belongsTo(\App\Models\Kategori::class, 'kategori_parent_id');
	}

	public function kategoris()
	{
		return $this->hasMany(\App\Models\Kategori::class, 'kategori_parent_id');
	}

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class, 'komplain_detail_kategori_id');
	}
}
