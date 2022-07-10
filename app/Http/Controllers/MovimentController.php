<?php

namespace App\Http\Controllers;

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
        // $filters = $request->post();

        $moviments = Moviment::query()->get()->toArray();

        $response['data'] = $moviments;

        return response()->json($response);
    }
}
