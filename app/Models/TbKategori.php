<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 05 Jan 2019 12:36:48 +0700.
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
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
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

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class, 'id_kategori');
	}
}
