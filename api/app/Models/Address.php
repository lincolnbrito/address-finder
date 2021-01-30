<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zipcode',
        'street',
        'neighborhood',
        'state',
        'city',
    ];

    public static function search(string $text) {
        //$columns = ["street"];

        if (empty(trim($text))) {
            return static::get();
        } else {
            $search = implode("%", str_split($text));
            $search = "%$search%";

            return static::where("street", "like", $search)->get();
        }
    }
}
