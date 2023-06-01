<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class phoneModel extends Model
{
    use HasFactory;
    protected $table='phones';
    protected $fillable = [
        'user_id',
        'phone',
    ];
    // protected $with = ['user'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
