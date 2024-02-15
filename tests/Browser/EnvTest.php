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
                ->assertSee('APP_ENV')
                ->assertSee('local')
                ->assertSee('IS_DUSK_ENV_FILE')
                ->assertSee('NO')
                ->assertSee('DB_DATABASE')
                ->assertSee('dusk_bug');
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
                ->assertSee('APP_ENV')
                ->assertSee('local')
                ->assertSee('IS_DUSK_ENV_FILE')
                ->assertSee('YES')
                ->assertSee('DB_DATABASE')
                ->assertSee('testing');
        });
    }
}
