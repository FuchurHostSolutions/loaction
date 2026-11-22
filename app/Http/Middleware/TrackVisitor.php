<?php

namespace App\Http\Middleware;

use App\Models\SiteVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya catat request GET pada halaman publik yang berhasil (status 200)
        // Abaikan route admin, static assets, internal health check, dan ajax
        if ($request->isMethod('GET')
            && ! $request->is('admin*')
            && ! $request->is('up')
            && ! $request->is('build*')
            && ! $request->ajax()
            && $response->getStatusCode() === 200
        ) {
            try {
                SiteVisit::track($request);
            } catch (\Throwable) {
                // Abaikan error pencatatan agar tidak mengganggu rendering halaman
            }
        }

        return $response;
    }
}
