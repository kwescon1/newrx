<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacist extends Model
{
    use HasFactory;

    protected $table = 'pharmacists';

    protected $guarded = ['id'];

    public function getImageAttribute($value)
    {
        if (!$value) {
            return;
        }

        return Storage::url($value);
    }
}
