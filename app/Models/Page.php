<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'published_on', 'user_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if(Auth::id() != null) {
                $model->user_id = Auth::id();
            }
        });
        static::updating(function ($model) {
            $model->user_id = Auth::id();
        });
    }
}
