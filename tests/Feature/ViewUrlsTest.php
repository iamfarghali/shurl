<?php

namespace Tests\Feature;

use App\Url;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewUrlsTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * @test
     */
    public function authenticated_user_can_view_his_urls ()
    {

        $user = factory( User::class )->create();
        $user->urls()->saveMany( factory( Url::class, 2 )->make() );
        $this->actingAs( $user )
             ->getJson( '/urls' )
             ->assertStatus( 200 )
             ->assertJson( $user->urls->toArray() );

    }


    /**
     * @test
     */
    public function authenticated_user_cannot_view_others_urls ()
    {

        $user = factory( User::class )->create();
        $otherUser = factory( User::class )->create();
        $otherUser->urls()->saveMany( factory( Url::class, 10 )->make() );

        $this->actingAs( $user )
             ->getJson( '/urls' )
             ->assertStatus( 200 )
             ->assertJsonMissing( $otherUser->urls->toArray() );
    }

    protected function setUp (): void
    {
        parent::setUp();
    }
}
