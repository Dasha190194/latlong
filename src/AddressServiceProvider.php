<?php

namespace Encore\Admin\Latlong;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Encore\Admin\Show;
use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(ExtensionAddress $extension)
    {
        if (! ExtensionAddress::boot()) {
            return ;
        }

        $this->loadViewsFrom($extension->views(), 'laravel-admin-latlong');

        Admin::booting(function () {
            Form::extend('address', Address::class);
            Show\Field::macro('address', ExtensionAddress::showField());
        });
    }
}