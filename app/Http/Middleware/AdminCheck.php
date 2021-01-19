<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

/**
 * Class AdminCheck.
 */
class AdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && ($request->user()->isType(User::TYPE_ADMIN) || $request->user()->isType(User::TYPE_DIRECTOR) || $request->user()->isType(User::TYPE_PRINCIPAL) || $request->user()->isType(User::TYPE_TEACHER))) {
            return $next($request);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
