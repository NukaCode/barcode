<?php namespace NukaCode\Barcode\Laravel5;

use Illuminate\Foundation\AliasLoader;

/**
 * Class ServiceProvider
 *
 * @package NukaCode\Barcode
 */
class ServiceProvider extends Illuminate\Support\ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
//        $this->package('nukacode/barcode');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->shareWithApp();
        $this->registerAliases();
    }

    /**
     * Share the package with application
     *
     * @return void
     */
    protected function shareWithApp()
    {
        $this->app->singleton('barcode', function () {
            return new MenuContainer();
        });
    }

    /**
     * Register aliases
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'Barcode' => 'NukaCode\Barcode\Laravel5\Facade',
        ];

        $loader = AliasLoader::getInstance();

        foreach ($aliases as $alias => $class) {
            $loader->alias($alias, $class);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['barcode'];
    }

}