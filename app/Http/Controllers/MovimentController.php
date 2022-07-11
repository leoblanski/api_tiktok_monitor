<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Http\Request;

use App\Models\Moviment;

class MovimentController extends Controller
{
    public function save(Request $request)
    {
        try {
            $params = $request->post();

            if (!$params) {
                throw new Exception("params is required");
            }
            $moviment = new Moviment();

            $moviment->username = $params['username'];
            $moviment->qty_gift = $params['qty_gift'];
            $moviment->amount = $params['amount'];
            $moviment->type = $params['type'];
            $moviment->voute = $params['voute'];
            $moviment->url_picture = $params['url_picture'];

            if (!$moviment->save()) {
                throw new Exception("Parameters not saved");
            }

            $response['status']  = 'success';
            $response['message'] = 'Movimentação registrada com sucesso. ID: '.$moviment->id;

        } catch (Exception $e) {
            $response = [];
            $response['status']  = 'error';
            $response['message'] = $e->getMessage();

            return response()->json($response)->setStatusCode(400);
        }
        return response()->json($response);
    }

    public function get(Request $request) {
        $filters = $request->get('filters');

        if (!isset($filters['type']) || !$filters['type']) {
            throw new Exception("Parameter type is required");
        }
        
        //Não estava sendo possível usar o Where, estava sempre resultando nulo, analisar e mudar querys.
        $response['sponsors'] = Moviment::whereRaw("type = 1")
            ->limit(3)
            ->get()
            ->toArray();

        $response['votes'] = Moviment::whereRaw("type = 2")
            ->limit(3)
            ->get()
            ->toArray();

        $response['firstCounter'] = Moviment::selectRaw("id")
            ->whereRaw('voute = "/lula"')
            ->count();

        $response['secondCounter'] = Moviment::selectRaw("id")
            ->whereRaw('voute = "/bolsonaro"')
            ->count();

        return response()->json($response);
    }
}
