<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 20 Dec 2018 08:47:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbKategori
 * 
 * @property int $id_kategori
 * @property string $nama_kategori
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $komplains
 *
 * @package App\Models
 */
class TbKategori extends Eloquent
{
	protected $table = 'tb_kategori';
	protected $primaryKey = 'id_kategori';

	protected $fillable = [
		'nama_kategori'
	];

	public function komplains()
	{
		return $this->hasMany(\App\Models\Komplain::class, 'id_kategori');
	}
}
