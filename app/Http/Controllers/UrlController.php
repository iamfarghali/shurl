<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function __construct ()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $urls = Url::where( 'user_id', auth()->user()->id )->get();
        if ( request()->expectsJson() ) {
            return response( $urls, 200 );
        }
        return view( 'urls.index', compact( 'urls' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store ( Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Url $url
     * @return \Illuminate\Http\Response
     */
    public function show ( Url $url )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Url $url
     * @return \Illuminate\Http\Response
     */
    public function edit ( Url $url )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Url                 $url
     * @return \Illuminate\Http\Response
     */
    public function update ( Request $request, Url $url )
    {
        //
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
