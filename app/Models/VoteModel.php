<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteModel extends BaseModel
{   
    protected $table = 'votes';

    public static function createNew(array $params) {
        $moviment = new VoteModel();

        $moviment->user = $params['user'];
        $moviment->name = $params['name'];
        $moviment->qty = $params['qty'];
        $moviment->amount = $params['amount'];
        $moviment->profile_picture = $params['profile_picture'];

    }
}
