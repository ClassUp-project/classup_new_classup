@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403 😭')
@section('message', __('Ben alors... on s\'est perdu dans les couloir ?'))

<div style="background-image: url('/img/coridor.png');"
    class="absolute pin bg-no-repeat md:bg-right bg-right">
</div>
