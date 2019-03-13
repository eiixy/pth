<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/13
 * Time: 9:58
 */

namespace Pth;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootPublishes();
    }


    /**
     * Bootstrap publishes
     *
     * @return void
     */
    protected function bootPublishes()
    {
        $configPath = __DIR__.'/../config';

        $this->publishes([
            $configPath.'/config.php' => config_path('pth.php'),
        ], 'config');
    }



    /**
     * Register console commands
     *
     * @return void
     */
    protected function registerConsole()
    {
        $this->commands(Console\PublishCommand::class);
    }
}
