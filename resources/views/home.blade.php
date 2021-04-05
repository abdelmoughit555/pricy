@extends('shopify-app::layouts.default')

@section('content')
    <div class="container mx-auto mt-24">
        <div class="flex space-x-8">
            <div class="px-4 py-6 bg-pricy-yellow rounded-xl" style="width: 260px; height:400px">
                <x-dashboard.swiper />
            </div>
            <div class="flex-1 ">
                <div>
                    @livewire('dashboard.chart')
                </div>

            </div>
        </div>

        <div class="flex items-center justify-between w-full mt-12">
            <div>
                <div class="flex space-x-8 ">
                    <div>
                        <p class="text-sm font-medium text-pricy-gray-400">Split test</p>
                        <hr class="h-1 mt-2 -mb-6 border-transparent rounded-full bg-pricy-gray-400" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-pricy-gray-400">Rules</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-pricy-gray-400">A.I</p>
                    </div>

                </div>
                <hr class="h-1 mt-2 -mb-6 bg-gray-200 border-transparent rounded-full" />
            </div>

            <div>
                <a href="{{ route('create-an-expirement') }} "
                    class="px-4 py-3 text-sm text-white rounded-lg bg-pricy-gray-400">+ create an
                    expirement</a>
            </div>
        </div>
        @livewire('dashboard.table')
    </div>
    <style>
        .text-green {
            color: #00BC8B
        }

        .bg-green {
            background-color: #00BC8B
        }

    </style>

@endsection
