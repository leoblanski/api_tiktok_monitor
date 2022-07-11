<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moviment extends Model
{   
    protected $table = 'moviment';

    const typeSponsor = '1';
    const typeVoutes = '2';

    const firstItem = '/lula';
    const secondItem = '/bolsonaro';
}
