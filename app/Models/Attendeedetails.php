<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;
use App\Traits\AutoFill;

class Attendeedetails extends Model
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

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    protected $fillable = [
        'name',
        'passportnum',
        'passportcopy',
        'mobilenum',
        'email',
        'valid_visa',
    ];
}
