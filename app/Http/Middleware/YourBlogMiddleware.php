<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YourBlogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $type = session()->get('type');
        $id = session()->get('id');
        $requestedId = $request->route('b_id');

        // Check if the user is a customer and if the requested ID does not match the logged-in user's ID
        if (session()->has('id') && $type === 'Customer' && $requestedId == $id) {
            return $next($request);
        } else {
            // Redirect to the home page or show an error message
            return redirect('/');
        }
    }
}
