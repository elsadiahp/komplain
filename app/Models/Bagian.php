<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Dec 2018 06:47:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bagian
 * 
 * @property int $bagian_id
 * @property string $bagian_nama
 * @property int $id_kategori
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TbKategori $tb_kategori
 *
 * @package App\Models
 */
class Bagian extends Eloquent
{
	protected $table = 'bagian';
	protected $primaryKey = 'bagian_id';

	protected $casts = [
		'id_kategori' => 'int'
	];

	protected $fillable = [
		'bagian_nama',
		'id_kategori'
	];

	public function tb_kategori()
	{
		return $this->belongsTo(\App\Models\TbKategori::class, 'id_kategori');
	}
}
