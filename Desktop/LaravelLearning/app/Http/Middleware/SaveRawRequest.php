<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class SaveRawRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $serializedRequest = serialize($request->all());
        DB::table('api_requests')->insert(['request_data' => $serializedRequest]);

        //dd($serializedRequest);

        return $next($request);
    }
}
