<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'birth_date',
        'gender',
        'phone_number',
    ];

    public function styles(){
        return $this->hasMany(Style::class);
    }


    public function style()
    {
        return $this->belongsTo(Style::class);
    }



    public static function list()
    {
        $dancer =Dancer::orderByRaw('full_name')->get();
        $list = [];
        foreach ($dancer as $dancer) {
            $list[$dancer->id] = $dancer->full_name;
        }

        return $list;
    }
}
