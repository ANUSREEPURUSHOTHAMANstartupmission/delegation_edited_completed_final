<?php

namespace App\Models;
use App\Traits\AutoFill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;


class Director extends Model
{
    use HasFactory,AutoFill,HashId;


    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    protected $fillable = [
        'startup_id',
        'name',
        'gender',
        'category',
        'din',
        'share',
    ];
}
