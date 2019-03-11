<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRequest;
use Illuminate\Http\Request;

class QbDirectApiController extends Controller
{
    public function createAccount(ApiRequest $request)
    {
        dd($request);
        return 'Request validated';
    }
}
