<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Dec 2018 06:47:06 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $bagians
 * @property \Illuminate\Database\Eloquent\Collection $kategori_details
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

	public function bagians()
	{
		return $this->hasMany(\App\Models\Bagian::class, 'id_kategori');
	}

	public function kategori_details()
	{
		return $this->hasMany(\App\Models\KategoriDetail::class, 'id_kategori');
	}
}
