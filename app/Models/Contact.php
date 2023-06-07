<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "phonenumber",
        'ContactType',
        'ContactValue',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
