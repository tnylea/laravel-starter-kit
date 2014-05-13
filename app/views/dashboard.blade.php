@extends('layouts.master')

@section('content')


Hello {{ Auth::user()->username }}! <a href="{{ URL::to('logout') }}">Logout?</a>


@stop