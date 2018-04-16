<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PagSeguro;
use App\Model\Transacoes;

class ApiPagSeguroController extends Controller
{
    public function request(Request $request, PagSeguro $pagseguro, Transacoes $transacoes)
    {
        
        if(!$request->notificationCode)
        return response()->json(['error' => 'NotNotificationCode'], 404);

        $response = $pagseguro->getStatusTransaction($request->notificationCode);

        $trans = $transacoes->where('reference', $response['reference'])->get()->first();
        $trans->changeStatus($response['status']);

        return response()->json(['success' => true]);
    }
}
