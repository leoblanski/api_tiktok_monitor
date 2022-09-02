<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftModel extends BaseModel
{   
    protected $table = 'gifts';

    public static function createNew(array $params) {
        $moviment = new GiftModel();

        $moviment->user = $params['user'];
        $moviment->name = $params['name'];
        $moviment->qty = $params['qty'];
        $moviment->amount = $params['amount'];
        $moviment->vote = $params['vote'];
        $moviment->profile_picture = $params['profile_picture'];
    }

}
