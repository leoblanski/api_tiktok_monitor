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
            $params = $request->post('params');

            if (!$params) {
                throw new Exception("params is required");
            }
            $moviment = new Moviment();

            $moviment->username = $params['username'];
            $moviment->qty_gift = $params['qty_gift'];
            $moviment->amount = $params['amount'];

            if (!$moviment->save) {
                throw new Exception("Parameters not saved");
            }

        } catch (Exception $e) {
            $response = [];
            $response['status']  = 'error';
            $response['message'] = $e->getMessage();

            return response()->json($response)->setStatusCode(400);
        }
    }
}
