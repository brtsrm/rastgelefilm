<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;
    protected $table = "genres";
    public function filmGenre()
    {
        return $this->hasOne(film::class, "genres_id", "id");
    }
    public function filmTotal()
    {
        return $this->filmGenre()->count();
    }
}
