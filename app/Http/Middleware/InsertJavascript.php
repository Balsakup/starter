<?php

namespace App\Http\Middleware;

use Closure;
use JavaScript;

class InsertJavascript
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function handle($request, Closure $next)
    {
        $termsOfService = cache('termsOfService');
        JavaScript::put([
            'locale'        => app()->getLocale(),
            'notifications' => __('notifications'),
            'cookieConsent' => __('cookieconsent'),
            'sumoSelect'    => __('sumoselect'),
            'templates' => [
                'loading' => view('components.common.notifications.loading')->render(),
            ],
            'static'        => __('static'),
            'routes'        => [
                'page' => [
                    'termsOfService' => $termsOfService
                        ? route('simplePage.show', $termsOfService->url)
                        : null,
                ],
            ],
        ]);

        return $next($request);
    }
}
