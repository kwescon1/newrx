<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'schools';

    protected $guarded = ['id'];

    public function hostels()
    {
        return $this->hasMany(Hostel::class, 'school_id');
    }
}
