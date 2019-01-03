<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Jan 2019 03:49:00 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bagian
 * 
 * @property int $bagian_id
 * @property string $bagian_nama
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tb_kategoris
 *
 * @package App\Models
 */
class Bagian extends Eloquent
{
	protected $table = 'bagian';
	protected $primaryKey = 'bagian_id';

	protected $fillable = [
		'bagian_nama'
	];

	public function tb_kategoris()
	{
		return $this->hasMany(\App\Models\TbKategori::class);
	}
}
