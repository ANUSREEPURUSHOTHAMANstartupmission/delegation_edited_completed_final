<?php

namespace App\Models;
use App\Traits\AutoFill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Application extends Model
{
    use HasFactory,AutoFill,HashId;

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    public function remark()
    {
        return $this->hasMany(Remark::class);
    }

    public function attendeedetails()
    {
        return $this->hasMany(Attendeedetails::class);
    }
}
