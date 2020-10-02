<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestApi;
use App\RequestApiRepository;

class RequestApiController extends Controller
{
    public function checkIin(Request $request)
    {
        $iin = RequestApi::query()->where('iin', $request->json('iin'))->first();

        if ($iin !== null) {
            return response()->json([
                'id' => $iin->id,
                'status' => RequestApi::STATUS_DOUBLE
            ]);
        }

        try {

//            $addRequest = $this->recording($request);
            $addRequest = new RequestApi;
            (new RequestApiRepository)->getAdd($addRequest, $request);

            return response()->json([
                'id' => $addRequest->id,
                'status' => $addRequest->status
            ]);

        } catch (\Throwable $err) {

            return response()->json([
                'status' => RequestApi::STATUS_ERROR,
                'message' => $err->getMessage()
            ]);
        }
    }
}

//    protected function recording(Request $request)
//    {
//        $addRequest = new RequestApi;
//        $addRequest->iin = $request->json('iin');
//        $addRequest->request = $request->json('request');
//        $addRequest->status = "ACCEPT";
//        $addRequest->saveOrFail();
//
//        return $addRequest;
//    }

