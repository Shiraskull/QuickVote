<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Voting extends Model
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

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'max_votes',
        'total_votes',
        'created_by'
    ];

    public function options(): HasMany
    {
        return $this->hasMany(Options::class, 'voting_id', 'id');
    }
}
