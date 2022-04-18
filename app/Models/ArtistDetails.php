<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function artist()
    {
        return $this->belongsTo(Artist::class,'artist_id');
    }
}
