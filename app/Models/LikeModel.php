<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeModel extends BaseModel
{   
    protected $table = 'likes';

    public static function createNew(array $params) {
        $moviment = new LikeModel();
        
        $moviment->qty = $params['qty'];
        $moviment->profile_picture = $params['profile_picture'];
        $moviment->user = $params['user'];
        $moviment->name = $params['name'];
    }
}
