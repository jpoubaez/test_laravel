<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;
use App\Services\NewsletterInt;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
   public function register()
    {
        app()->bind(NewsletterInt::class, function () {
            return new Newsletter(
                new ApiClient()
            );
        });
        // amb php 8 podriem fer, i tota referencia a quin servei faig servir estaria aquí
       /* app()->bind(NewsletterInt::class, function () {
            
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);

            return new Newsletter($client);
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
