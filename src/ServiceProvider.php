<?php
/**
 * Created by PhpStorm.
 * User: lzning
 * Date: 2018/12/6
 * Time: 9:33 AM
 */

namespace Zning\FacePlus;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton(FacePlus::class, function () {
            return new FacePlus(config('services.face++.key'), config('services.face++.secret'));
        });

        $this->app->alias(FacePlus::class, 'FacePlus');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [FacePlus::class, 'FacePlus'];
    }

}