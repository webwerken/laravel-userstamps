<?php

namespace Hrshadhin\Userstamps;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;


class UserstampsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Blueprint::macro(
            'userstamps', function () {
                $this->string('created_by', 35)->nullable();
                $this->string('updated_by', 35)->nullable();    
            }
        );
        Blueprint::macro(
            'dropUserstamps', function () {
                $this->dropColumn(['created_by', 'updated_by']);
            }
        );
    }
}
