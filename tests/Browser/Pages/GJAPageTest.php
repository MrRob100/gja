<?php

namespace Tests\Browser\Pages;

use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GJAPageTest extends DuskTestCase
{
    public function testHitDegiro()
    {
        Log::info('testing');

        dd('pre browse');

        $this->browse(function (Browser $browser) {

//            dd($this->jam);

            $stock = "Goldman Sachs";

//            DB::table('test')->insert(['col' => rand(0, 10)]);

//            dd('brrr');

            $browser->visit('https://trader.degiro.nl/login/uk#/login')
                ->waitForText('Username')
                ->type('username', env('DEGIRO_USER'))
                ->type('password', env('DEGIRO_PASS'))
                ->press('Login')
                ->waitForText('Place Order')
                ->clickAtXPath('/html/body/div[1]/div/div[1]/div[1]/div[2]/div/button[1]')
                ->waitForText('Other orders')
                ->type('productSearchInput', 'Goldman')
                ->waitForText('Goldman Sachs Group')
                ->pause(1000)
                ->clickAtXPath('/html/body/div[1]/div/div[1]/div[2]/section/div/div/div/div[2]/button[1]')
                ->waitForText('PLACE ORDER')
                ->screenshot('outcome');

            $text = $browser->text('selector');

            //        $output = $browser->script([
//            'document.body.scrollTop = 0',
//            'document.documentElement.scrollTop = 0',
//        ]);

        });
    }
}
