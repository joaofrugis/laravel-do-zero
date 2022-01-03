<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactFormTest extends DuskTestCase
{
    /**
    @test
    */
    public function visitContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Nome completo');
        });
    }


    public function testIfInputsExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                    ->assertSee('Nome completo')
                    ->assertSee('Email')
                    ->assertSee('Mensagem');
        });   
    }

    public function testIfContactFormIsWorking()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')        
                    ->type('name','TEste Teste')
                    ->type('email','emailteste@gmail.com')
                    ->type('message','Valeu galera')
                    ->press('Enviar mensagem')
                    ->assertPathIs('/contato')
                    ->assertSee('O contato foi criado com sucesso');
        });   
    }
}
