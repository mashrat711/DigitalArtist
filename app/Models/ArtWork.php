<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;


class ArtWork extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
    public function artist()
    {
        return $this->belongsTo(Artist::class,'artist_id');
    }
    
    public function setDobAttribute($input)
    {
        !empty($input) ? $this->attributes['event_date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d') : null;
    }
}
