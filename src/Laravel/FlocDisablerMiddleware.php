<?php

namespace Kcs\FlocDisabler\Laravel;

use Illuminate\Http\Request;
use Kcs\FlocDisabler\Symfony\Disabler;

class FlocDisablerMiddleware
{
    /**
     * Handles the request, append the floc opt-out header.
     *
     * @param Request $request
     * @param callable $next
     */
    public function handle($request, $next)
    {
        $response = $next($request);
        Disabler::disable($response);

        return $response;
    }
}
