<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $client->setClientId('1042251526277-av5o5nvtsar1mreohvut29rvim55d75s.apps.googleusercontent.com');
            $client->setClientSecret('2LrnM5uWgUhLRTLbGRNHjmj2');
            $client->refreshToken('1//04slkPFn9cHBRCgYIARAAGAQSNwF-L9Irc_LT9IWWMGNhA1uxxgaxl6aAWaE94HrJ0E8CmG9SDO7S2jl-r_CW-HzL9SapJ6jdOGI');
            $service = new \Google_Service_Drive($client);
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, '1I-xSKvFt2hXuwD0iMfQG_x5NT8rhuMZR');

            return new \League\Flysystem\Filesystem($adapter);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}