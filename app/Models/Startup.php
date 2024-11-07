<?php

namespace App\Models;

use App\Traits\AutoFill;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Startup extends Model
{
    use HasFactory, AutoFill, HashId;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function directors()
    {
        return $this->hasMany(Director::class);
    }

    protected $fillable = [
        'name',
        'email',
        'website',
        'contact_num',
        'location',
        'unique_id',
        'founding_year',
        'user_id',
    ];
}
