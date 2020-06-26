@extends('layouts.app')

@section('content')
    <div class="container">
        <app :urls="{{$urls}}"></app>
    </div>
    </div>
@endsection
