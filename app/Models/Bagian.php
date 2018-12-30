<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $kategoris
 *
 * @package App\Models
 */
class Bagian extends Eloquent
{
	protected $primaryKey = 'bagian_id';

	protected $fillable = [
		'bagian_nama'
	];

	public function kategoris()
	{
		return $this->hasMany(\App\Models\Kategori::class, 'kategori_bagian_id');
	}
}
