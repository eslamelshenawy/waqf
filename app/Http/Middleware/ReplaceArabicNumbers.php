<?php

namespace App\Http\Middleware;

use Closure;

class ReplaceArabicNumbers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->hasAny('number', 'instrument_number', 'construction_license_number', 'price', 'space' ,'service_price')){
            if($request->has('number')){
                $request->merge(['number' => utf8($request->number)]);
            }

            if($request->has('instrument_number')){
                $request->merge(['instrument_number' => utf8($request->instrument_number)]);
            }

            if($request->has('construction_license_number')){
                $request->merge(['construction_license_number' => utf8($request->construction_license_number)]);
            }

            if($request->has('price')){
                $request->merge(['price' => utf8($request->price)]);
            }

            if($request->has('space')){
                $request->merge(['space' => utf8($request->space)]);
            }

            if($request->has('service_price')){
                $request->merge(['service_price' => utf8($request->service_price)]);
            }
        }

        return $next($request);
    }
}
