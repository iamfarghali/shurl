<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateUrlTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function guest_may_create_short_url ()
    {
        $url = 'https://laravel.com/docs/7.x/http-tests#assert-json';
        $this->post( '/urls', [ 'url' => $url ] )
             ->assertStatus( 201 )
             ->assertJsonFragment( [ 'url' => $url, 'user_id' => null ] );
    }

    /**
     * @test
     */
    public function authenticated_user_may_create_short_url ()
    {
        $this->signIn();
        $url = 'https://laravel.com/docs/7.x/http-tests#assert-json';
        $this->post( '/urls', [ 'url' => $url ] )
             ->assertStatus( 201 )
             ->assertJsonFragment( [ 'url' => $url, 'user_id' => $this->user->id ] );
    }
}
