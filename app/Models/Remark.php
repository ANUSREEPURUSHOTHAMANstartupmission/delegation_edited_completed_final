<?php

namespace App\Models;
use App\Traits\AutoFill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Remark extends Model
{
    use HasFactory,AutoFill,HashId;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

