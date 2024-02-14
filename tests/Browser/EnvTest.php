<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EnvTest extends DuskTestCase
{
    /**
     * @test
     */
    public function should_not_work_as_dusk_specific_env_file_exists(): void
    {
        $this->browse(function (Browser $b) {
            $b->visit('/test')
                ->waitForText('APP_ENV')
                ->waitForText('local')
                ->waitForText('IS_DUSK_ENV_FILE')
                ->waitForText('NO')
                ->waitForText('DB_DATABASE')
                ->waitForText('dusk_bug');
        });
    }

    /**
     * Note: Is testing the .env.dusk.local values
     * 
     * @test
     */
    public function should_detect_dusk_env_file_values(): void
    {
        $this->browse(function (Browser $b) {
            $b->visit('/test')
                ->waitForText('APP_ENV')
                ->waitForText('local')
                ->waitForText('IS_DUSK_ENV_FILE')
                ->waitForText('YES')
                ->waitForText('DB_DATABASE')
                ->waitForText('testing');
        });
    }
}
