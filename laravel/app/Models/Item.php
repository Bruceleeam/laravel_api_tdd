<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    public const NOT_STARTED = 'not_started';
    public const STARTED = 'started';
    public const PENDING = 'pending';

    protected $fillable = [
        'title',
        'user_id',
        'status'
    ];

    public function user(): BelongsTo   
    {
        return $this->belongsTo(User::class);   
    }

}
