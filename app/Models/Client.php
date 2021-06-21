<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected  $fillable = ["fullname", "name", "surname", "email", "phone", "amount", "total", "note", "currency", "city", "country", "address","status"];
}
