<?php

namespace Tests\Feature;

use App\Url;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UrlTest extends TestCase
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
             ->get( '/urls' )
             ->assertStatus( 200 )
             ->assertSeeText( $user->urls->toArray()[0]['code'] )
             ->assertSeeText( $user->urls->toArray()[1]['code'] );

    }


    /**
     * @test
     */
    public function authenticated_user_can_not_view_others_urls ()
    {

        $user = factory( User::class )->create();
        factory( Url::class, 2 )->create( [ 'user_id' => 10 ] );
        $this->actingAs( $user )
             ->get( '/urls' )
             ->assertStatus( 200 )
             ->assertSeeText( 'No Data' );
    }

    protected function setUp (): void
    {
        parent::setUp();
    }
}
