<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function artistDetails()
    {
        return $this->hasMany(ArtistDetails::class);
    }
    public function setDobAttribute($input)
    {
        !empty($input) ? $this->attributes['dob'] = Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d') : null;
    }
}
