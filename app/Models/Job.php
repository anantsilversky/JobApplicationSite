<?php

namespace App\Models;

use App\Models\Applications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function applications(){
        return $this->hasMany(Applications::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }
    public function fee(){
        return $this->hasOne(Fee::class);
    }
}
