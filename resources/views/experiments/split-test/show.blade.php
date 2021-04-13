@extends('shopify-app::layouts.default')

@section('content')
    <div class="container mx-auto">
        <h2>{{ $splitTest->title }}</h2>
    </div>

    @livewire('experiments.split-test.show-split-test', ['splitTestId' =>
    $splitTest->uuid])
@endsection
