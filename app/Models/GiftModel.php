<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftModel extends BaseModel
{   
    protected $table = 'gifts';

    public static function createNew(array $params) {
        $moviment = new GiftModel();

        $moviment->username = $params['username'];
        $moviment->qty_gift = $params['qty_gift'];
        $moviment->amount = $params['amount'];
        $moviment->type = $params['type'];
        $moviment->voute = $params['voute'];
        $moviment->url_picture = $params['url_picture'];
    }

}
