<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waroeng extends Model
{
    protected $table = 'waroeng';
    protected $primaryKey = 'waroeng_id';

    protected $fillable = [
        'waroeng_nama', 'waroeng_alamat', 'area_id'
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area_id', 'area_id');
    }
}
