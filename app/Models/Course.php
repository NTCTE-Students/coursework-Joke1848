<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Course extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name',
        'cost',
        'description'
    ];
    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
