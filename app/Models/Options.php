<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Options extends Model
{
    public $incrementing = false; // Nonaktifkan auto-increment
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        // Event untuk mengisi UUID
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    //
    protected $fillable = ['option_name', 'image','voting_id'];
}
