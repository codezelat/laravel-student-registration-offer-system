<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckRegistrationDeadline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get deadline from environment
        $deadline = env('COUNTDOWN_DEADLINE');
        
        // If no deadline is set, allow access
        if (!$deadline) {
            return $next($request);
        }
        
        try {
            // Parse the deadline and check if it has passed
            $deadlineDate = Carbon::parse($deadline);
            $now = Carbon::now();
            
            // If deadline has passed, redirect to offer ended page
            if ($now->greaterThan($deadlineDate)) {
                // Don't redirect if already on offer-ended page or admin routes
                if (!$request->is('offer-ended') && !$request->is('sitc-admin-area/*') && !$request->is('superadminloginsitc')) {
                    return redirect()->route('offer.ended');
                }
            }
        } catch (\Exception $e) {
            // If there's an error parsing the date, log it and continue
            Log::error('Error parsing COUNTDOWN_DEADLINE: ' . $e->getMessage());
        }
        
        return $next($request);
    }
}
