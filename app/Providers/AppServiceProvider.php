<?php

namespace App\Providers;

use App\Actions\CreateMagicImage;
use App\Actions\DeleteMagicImage;
use App\Actions\UpdateMagicImage;
use App\Contracts\CreatesMagicImages;
use App\Contracts\DeletesMagicImages;
use App\Contracts\ShowMagicImage;
use App\Contracts\UpdatesMagicImages;
use App\GD\Draw;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton(CreatesMagicImages::class, CreateMagicImage::class);
        app()->singleton(UpdatesMagicImages::class, UpdateMagicImage::class);
        app()->singleton(DeletesMagicImages::class, DeleteMagicImage::class);
        app()->singleton(ShowMagicImage::class,Draw::class);
    }
}
