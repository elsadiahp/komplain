<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 20 Dec 2018 08:47:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Komplain
 * 
 * @property int $komplain_id
 * @property int $waroeng_id
 * @property int $id_kategori
 * @property string $media_koplain
 * @property string $isi_komplain
 * @property \Carbon\Carbon $tanggal_komplain
 * @property \Carbon\Carbon $waktu_komplain
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TbKategori $tb_kategori
 * @property \App\Models\Waroeng $waroeng
 *
 * @package App\Models
 */
class Komplain extends Eloquent
{
	protected $table = 'komplain';
	protected $primaryKey = 'komplain_id';

//	protected $casts = [
//		'waroeng_id' => 'int',
//		'id_kategori' => 'int'
//	];

	protected $dates = [
		'tanggal_komplain',
		'waktu_komplain'
	];

	protected $fillable = [
		'waroeng_id',
		'id_kategori',
		'media_koplain',
		'isi_komplain',
		'tanggal_komplain',
		'waktu_komplain'
	];

	public function tb_kategori()
	{
		return $this->belongsTo(\App\Models\TbKategori::class, 'id_kategori');
	}

	public function waroeng()
	{
		return $this->belongsTo(\App\Models\Waroeng::class,'waroeng_id');
	}
}
