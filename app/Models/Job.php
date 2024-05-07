<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;
    protected $filllable = ["title" , "description", "status_id", "deadline"];
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}