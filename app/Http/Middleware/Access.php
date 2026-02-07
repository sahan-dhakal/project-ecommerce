<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->get('username', '');
        $password = Hash::make($request->get('password',''));
        if ($username== 'admin' && Hash::check('admin123',$password)) {
            return $next($request);
        }else{
            return redirect()->route('frontend.home');
        }
        
}
}