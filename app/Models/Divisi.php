<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    protected $guarded = [];

    public function Users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
