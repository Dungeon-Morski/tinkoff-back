<?php


namespace App\Actions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Action
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseWithToken($token, $responseMessage)
    {
        return \response()->json([
            "success" => true,
            "message" => $responseMessage,
            "token" => $token,
        ], 200);
    }

    public function responseWithData($data, $responseMessage)
    {
        return \response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $data,
        ], 200);


    }

    public function trueresponse($responseMessage)
    {
        return \response()->json([
            "success" => true,
            "message" => $responseMessage,
        ], 200);
    }

    public function falseresponse($responseMessage)
    {

        return \response()->json([
            "success" => false,
            "message" => $responseMessage,
        ], 200);

    }
}
