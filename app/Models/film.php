<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;
    protected $table = "film";
    protected $guarded = [];
    public function filmDetail()
    {
        return $this->hasOne(film_detail::class, "film_id", "id")->withDefault();
    }
    public function genresName()
    {
        return $this->hasOne(genres::class, "id", "genres_id")->withDefault();
    }
}
