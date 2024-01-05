<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cutis;

class Employees extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'nomor_induk';
    public $incrementing = false;

    public function cuti(){
        return $this->hasMany(Cutis::class);
    }
}
