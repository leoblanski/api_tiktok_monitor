<?php

namespace App\Http\Controllers;

use App\Models\BaseModel;
use App\Models\GiftModel;
use App\Models\LikeModel;
use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Http\Request;

use App\Models\Moviment;
use App\Models\VoteModel;

class MovimentController extends Controller
{
    public function save(Request $request)
    {
        try {
            $params = $request->post();

            if (!$params) {
                throw new Exception("params is required");
            }
            
            switch ($params['type']) {
                case BaseModel::typeGift:
                    $moviment = GiftModel::createNew($params);
                    break;
                case BaseModel::typeLike:
                    $moviment = LikeModel::createNew($params);
                    break;
                case BaseModel::typeVoute:
                    $moviment = VoteModel::createNew($params);
                    break;
                default:
                    break;
            }


            if (!$moviment->save()) {
                throw new Exception("Parameters not saved");
            }

            $response['status']  = 'success';
            $response['message'] = 'Movimentacao de '. BaseModel::typeLikesLabel[$params['type']] .' registrada com sucesso. ID: '.$moviment->id;

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

        $response['gifts'] = GiftModel::limit(3)
            ->get()
            ->toArray();

        $response['likes'] = LikeModel::limit(3)
            ->get()
            ->toArray();

        $response['votes'] = VoteModel::limit(3)
            ->get()
            ->toArray();

        $response['firstCounter'] = VoteModel::selectRaw("id")
            ->where("vote", "=", 1)
            ->count();

        $response['secondCounter'] = VoteModel::selectRaw("id")
            ->where("vote", "=", 2)
            ->count();

        return response()->json($response);
    }
}
