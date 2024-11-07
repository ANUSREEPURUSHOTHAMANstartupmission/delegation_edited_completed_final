<?php

namespace App\Models;
use App\Traits\AutoFill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;


class Events extends Model
{
    use HasFactory,AutoFill,HashId;

    public function applications()
    {
        return $this->hasMany(Application::class, 'event_id');
    }

}
