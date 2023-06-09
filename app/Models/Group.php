<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        "Groups_Title",
        "Groups_Desc",
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
