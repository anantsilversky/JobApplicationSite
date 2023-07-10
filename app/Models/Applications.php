<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'application_id');
    }
    
    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class, 'job_id', 'job_id');
    }
}
