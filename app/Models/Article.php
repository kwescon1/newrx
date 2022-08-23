<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    public $incrementing = false;

    protected $primaryKey = 'slug';

    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if (!$value) {
            return;
        }

        return Storage::url($value);
    }
}
