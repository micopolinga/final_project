<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    protected $fillable = [

        'dancer_id',
        'name',
        'description',
        'origin',
    ];

    public function dancer(){
        return $this->belongsTo(Dancer::class);
    }
    public static function list()
    {
        $style =Style::orderByRaw('name')->get();
        $list = [];
        foreach ($style as $style) {
            $list[$style->id] = $style->name;
        }

        return $list;
    }

}
