@extends('layouts.app')

@section('content')
    <div class="site-header size-sm"></div>

    <resume-component candidate-id="{{Auth::user()->userable->id}}"></resume-component>

@endsection