<?php

namespace App\Http\Middleware;

use App\Models\Purchase;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PurchaseDetailsMiddlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $type = session()->get('type');
        $id = session()->get('id');
        $requestedId = $request->route('c_id');

        // Check if the user is a customer and if the requested ID does not match the logged-in user's ID
        if (session()->has('id') && $type === 'Customer' && $requestedId == $id) {
            return $next($request);
        } else {
            // Redirect to the home page or show an error message
            return redirect('/');
        }
    }
    
}
