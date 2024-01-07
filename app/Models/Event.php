<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'style_id',
        'event_name',

        'date',
        'venue',
        'description',
    ];


    public function style()
    {
        return $this->belongsTo(Style::class);
    }


}
