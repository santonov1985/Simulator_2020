<?php

namespace App;

use App\RequestApi;
use Illuminate\Http\Request;


class RequestApiRepository
{
    public function getAdd(
        RequestApi $addRequest,
        Request $request
    ){
        $addRequest->iin = $request->json('iin');
        $addRequest->request = $request->json('request');
        $addRequest->status = "ACCEPT";
        $addRequest->saveOrFail();

        return $addRequest;
    }
}
