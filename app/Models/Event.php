<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtWork;
use App\Models\Artist;



class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artWorks()
    {
        return $this->hasMany(ArtWork::class);
    }
    


    public function setDobAttribute($input)
    {
        !empty($input) ? $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d') : null;
    }
}
