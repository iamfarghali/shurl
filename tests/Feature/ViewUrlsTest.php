<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewUrlsTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * @test
     */
    public function guest_cannot_browse_urls_view ()
    {
        $this->getJson( '/urls' )
             ->assertStatus( 401 );
    }

    /**
     * @test
     */
    public function authenticated_user_can_view_his_urls ()
    {
        $this->signIn();
        $this->user->urls()->saveMany( make( 'App\Url', 2 ) );
        $this->getJson( '/urls' )
             ->assertStatus( 200 )
             ->assertJson( $this->user->urls->toArray() );
    }


    /**
     * @test
     */
    public function authenticated_user_cannot_view_others_urls ()
    {
        $this->signIn();

        $anotherUser = create( 'App\User' );
        $anotherUser->urls()->saveMany( make( 'App\Url', 2 ) );

        $this->getJson( '/urls' )
             ->assertStatus( 200 )
             ->assertJsonMissing( $anotherUser->urls->toArray() );
    }

}
