<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testvisitarpagina()
    {
        $this->browse(function (Browser $browser) {

            //1
            $browser->visit('/videoclub/public/login')
                    ->assertSee('Videoclub')
                    ->pause(1000)


                    //2
                    ->waitForText('Login')
                    ->type('email','dylanhurtos@gmail.com')
                    ->type('password','Admin1234')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/videoclub/public/catalog')
                    ->pause(1000)

                    //3
                    ->type('buscar','coronavirus')
                    ->click('button[type="submit"]')
                    ->pause(1000)

                    //4
                    ->type('buscar','El pepino')
                    ->click('button[type="submit"]')
                    ->pause(1000)

                    //5
                    ->clickLink('El pepino')
                    ->pause(1000);
                    //6
                    $browser->driver->executeScript('window.scrollTo(0, 2000);');
                    $browser->pause(1000)

                    //7
                    ->type('title', 'Proves Dylan')
                    ->select('stars', '5')
                    ->type('review', 'HULAS')
                    ->press('Comenta')
                    ->pause(1000)
                    
                    //8
                    ->press('OPCIONS')
                    ->pause(1000)
                    ->clickLink('Nueva película')
                    ->assertPathIs('/videoclub/public/catalog/create')
                    ->type('title', 'Dolan')
                    ->type('year', '1999')
                    ->type('director', 'Dolan Kartoffel')
                    ->type('img', 'https://www.pngitem.com/pimgs/m/524-5246127_kawaii-kartoffel-potato-sticker-hd-png-download.png')
                    ->select('category', '1')
                    ->type('trailer', 'https://www.youtube.com/watch?v=yftjMJVN4dE')
                    ->type('synopsis', 'Patatas alemanas')
                    ->press('Añadir película')
                    ->pause(5000);
                    $browser->driver->executeScript('window.scrollTo(0, 2000);');
                    $browser->pause(1000)
                    
                    //9
                    ->press('Cerrar sesión')
                    ->assertPathIs('/videoclub/public/login')
                    ->pause(1000);

        });

        
    }

}
