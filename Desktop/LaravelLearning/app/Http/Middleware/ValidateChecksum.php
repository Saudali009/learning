<?php

namespace App\Http\Middleware;

use Closure;

class ValidateChecksum
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
        $temp_array = implode("", array_except($request->all(), ['checksum']));
        $secret_key = $request->get('secret_key');
        $check_sum_calculated = hash('sha256', $temp_array . $secret_key);
        $input_checksum = $request->get('checksum');

        return $next($request);

    }
}
