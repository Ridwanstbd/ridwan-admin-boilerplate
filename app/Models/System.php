<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class System extends Model
{
    protected $fillable = ['name','favicon','description','address'];
    /**
     * The users that belong to the system.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'system_users')->withTimestamps();
    }
}
