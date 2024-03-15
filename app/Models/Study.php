<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'lecturer_id',
    // ];

    public function lecturer()
    {
        return $this->belongsTo(User::class);
    }
}
