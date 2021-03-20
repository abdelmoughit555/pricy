<!-- resources/views/child.blade.php -->

@extends('shopify-app::layouts.default')

@section('title', 'Page Title')

@section('content')
    @livewire('experiments.split-test.steps')
@endsection
