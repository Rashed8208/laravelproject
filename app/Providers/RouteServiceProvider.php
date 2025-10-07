<?php

namespace App\Providers;

use App\Models\Order; // ✅ Add this import
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Models\Order; // ✅ Import the Order model

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        // ✅ Call parent::boot() to maintain default behavior
        parent::boot();

        // ✅ Define model binding for {order} route parameter
        Route::model('order', Order::class);

        // ✅ Define API rate limiting
=======
        parent::boot(); // ✅ Keep this call

        // ✅ Route model binding for Order
        Route::model('order', Order::class);

        // ✅ Rate limiter configuration
>>>>>>> 9b8691639e0dfd5a5baf1ff4406afafe19a49bcc
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

<<<<<<< HEAD
        // ✅ Register route groups
=======
        // ✅ Define web and API routes
>>>>>>> 9b8691639e0dfd5a5baf1ff4406afafe19a49bcc
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
