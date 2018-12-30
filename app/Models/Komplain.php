<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Dec 2018 09:38:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Komplain
 * 
 * @property int $komplain_id
 * @property int $komplain_waroeng_id
 * @property int $komplain_media_id
 * @property string $komplain_isi
 * @property \Carbon\Carbon $komplain_tanggal
 * @property \Carbon\Carbon $komplain_waktu
 * @property int $komplain_input_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Media $media
 * @property \App\Models\Waroeng $waroeng
 * @property \Illuminate\Database\Eloquent\Collection $komplain_details
 *
 * @package App\Models
 */
class Komplain extends Eloquent
{
	protected $primaryKey = 'komplain_id';

	protected $casts = [
		'komplain_waroeng_id' => 'int',
		'komplain_media_id' => 'int',
		'komplain_input_by' => 'int'
	];

	protected $dates = [
		'komplain_tanggal',
		'komplain_waktu'
	];

	protected $fillable = [
		'komplain_waroeng_id',
		'komplain_media_id',
		'komplain_isi',
		'komplain_tanggal',
		'komplain_waktu',
		'komplain_input_by'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'komplain_input_by');
	}

	public function media()
	{
		return $this->belongsTo(\App\Models\Media::class, 'komplain_media_id');
	}

	public function waroeng()
	{
		return $this->belongsTo(\App\Models\Waroeng::class, 'komplain_waroeng_id');
	}

	public function komplain_details()
	{
		return $this->hasMany(\App\Models\KomplainDetail::class, 'komplain_detail_komplain_id');
	}
}
