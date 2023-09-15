<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\CustomHelpers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('model_type', function ($expression) {
            return "<?php echo \App\Helpers\CustomHelpers::modelType($expression); ?>";
        });

        Blade::directive('user_pronoun_choice', function ($expression) {
            list($user, $contextUser) = explode(',', $expression);
            return "<?php echo \App\Helpers\CustomHelpers::userPronounChoice($user, $contextUser); ?>";
        });
    }
}
