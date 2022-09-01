<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BaseModel extends Model
{   
    const typeLikesLabel = [
        self::typeGift => "Presente",
        self::typeLike => "Likes",
        self::typeVoute => "Voto",
    ];

    const typeLike = '1';
    const typeGift = '2';
    const typeVoute = '3';

}
