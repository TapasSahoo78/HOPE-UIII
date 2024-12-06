<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role, $permission = null): Response
    {
        $user = auth()->user();
        if (isset($user) && !empty($user)) {
            if (!$request->user()->hasRole($role)) {
                if ($request->is('api/*')) {
                    abort(
                        response()->json(
                            [
                                'status' => false,
                                'response_code' => 403,
                                'error' => 'Unauthorized',
                                'message' => 'Role:' . $role . ' is not allowed to access this resource',
                            ],
                            403
                        )
                    );
                } else {
                    if (Auth::user()->hasRole('admin')) {
                        return redirect()->route('admin.dashboard');
                    }
                    if (Auth::user()->hasRole('user')) {
                        return redirect()->route('homepage');
                    }
                }
            }
        }

        if ($permission !== null && !$request->user()->can($permission)) {
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
