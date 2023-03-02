<?php

namespace Keko94\NovaInlineRelationship;

use Illuminate\Support\Facades\File;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Nova\Fields\Field;
use Illuminate\Support\ServiceProvider;
use Keko94\NovaInlineRelationship\Helpers\NovaInlineRelationshipHelper;
use Keko94\NovaInlineRelationship\Exceptions\UnsupportedRelationshipType;

class NovaInlineRelationshipServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadJsonTranslationsFrom(lang_path('vendor/nova-inline-relationship'));

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('nova-inline-relationships.php'),
            ], 'nova-inline-relationships');
        }

        Nova::serving(function () {
            Nova::script('nova-inline-relationship', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-inline-relationship', __DIR__ . '/../dist/css/field.css');
            $localeFile = lang_path('vendor/nova-inline-relationship/' . app()->getLocale() . '.json');
            if (File::exists($localeFile)) {
                Nova::translations($localeFile);
            }
        });

        Field::macro('inline', function () {
            if (! class_exists(NovaInlineRelationshipHelper::getObserver($this))) {
                throw UnsupportedRelationshipType::create(class_basename($this), $this->attribute);
            }

            return NovaInlineRelationship::make($this->name, $this->attribute)->resourceClass($this->resourceClass);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'nova-inline-relationships');
    }
}
