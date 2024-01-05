<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee(){
        return $this->belongsTo(Employees::class, 'employees_nomor_induk', 'nomor_induk');
    }
}
