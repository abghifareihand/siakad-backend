<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return Carbon::parse($date)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    }
}
