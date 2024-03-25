<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Article;
use App\Models\Ticket;
use Illuminate\Support\Facades\URL;

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
        
        if (env('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // $article = Article::where('approved',"1")->get();
        // view()->share('article', $article);

        // $tiket = Ticket::where('approved',"1")->get();
        // view()->share('ticket', $tiket);

    }
}
