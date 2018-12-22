<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Dec 2018 09:53:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Komplain
 * 
 * @property int $komplain_id
 * @property int $waroeng_id
 * @property string $media_koplain
 * @property string $isi_komplain
 * @property \Carbon\Carbon $tanggal_komplain
 * @property \Carbon\Carbon $waktu_komplain
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Waroeng $waroeng
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
 *
 * @package App\Models
 */
class Komplain extends Eloquent
{
	protected $table = 'komplain';
	protected $primaryKey = 'komplain_id';

	protected $casts = [
		'waroeng_id' => 'int'
	];

	protected $dates = [
		'tanggal_komplain',
		'waktu_komplain'
	];

	protected $fillable = [
		'waroeng_id',
		'media_koplain',
		'isi_komplain',
		'tanggal_komplain',
		'waktu_komplain'
	];

	public function waroeng()
	{
		return $this->belongsTo(\App\Models\Waroeng::class);
	}

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class);
	}
}
