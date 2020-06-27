<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function __construct ()
    {
        $this->middleware( 'auth' )->except( 'store' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $urls = Url::where( 'user_id', auth()->id() )->get();
        if ( request()->expectsJson() ) {
            return response( $urls, 200 );
        }
        return view( 'urls.index', compact( 'urls' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store ( Request $request )
    {
        $url = Url::create( [
            'url'     => $request->url,
            'user_id' => auth()->check() ? auth()->id() : null
        ] );
        $url->code = from_base10_to_base62( $url->id + rand( 1, 99999 ) );
        $url->update();
        return response( $url, 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Url $url
     * @return \Illuminate\Http\Response
     */
    public function show ( Url $url )
    {
        if ( auth()->id() === $url->user_id ) {
            return response( $url, 200 );
        }
        return response( [], 204 );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Url $url
     * @return \Illuminate\Http\Response
     */
    public function destroy ( Url $url )
    {
        //
    }
}
