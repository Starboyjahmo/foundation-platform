<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        if(!Visit::where('ip_address', $ip)->exists()){
            Visit::create(['ip_address' => $ip]);
        }
        return $next($request);
    }
}