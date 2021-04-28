@extends('shopify-app::layouts.default')
@section('title')Tutorial @endsection
<div class="h-full">
    <div class="flex flex-col justify-center h-full" x-data="{
        swipers: [
            {
                'title': 'One source of truth',
                'description': 'Set dynamic pricing rules to make sure that your store always has the most competitive and profitable prices',
                'image': 'images/woman.png'
            },
            {
                'title': 'Manage your prices',
                'description': 'with our Artificial intelligence you can create, optimize, and manage your prices. You can instruct the our Artificial intelligence to optimise on margin, and watch your margins grow',
                'image': 'images/guy.png'
            },
            {
                'title': 'One source of truth',
                'description': 'set dynamic pricing rules to make sure that your store always has the most competitive and profitable prices.',
                'image': 'images/clothes.png'
            }
        ],
        totalSteps: 3,
        currentStep: 1
     }">
        <div class="relative flex h-full">
            <template x-for="(swiper, index) in swipers" :key="swiper.title">
                <div class="absolute top-0 w-full h-full" x-show="currentStep == index + 1">
                    <div class="h-full">
                        <div class="flex h-full">
                            <div class="flex flex-col justify-center w-1/2 h-full px-44">
                                <div class="w-2/3 h-80">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img src="{{ asset('images/logo.png') }}" class="w-5" />
                                        </div>
                                        <p class="font-semibold capitalize text-pricy-gray-400 text-pricy-medium">
                                            pricely
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-pricy-gray-200 text-pricy-sm">Step <span
                                                x-text="currentStep"></span>
                                            of
                                            <span x-text="totalSteps"></span>
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <h1 class="font-semibold text-pricy-lg text-pricy-gray-400"
                                            x-text="swiper.title">
                                        </h1>
                                    </div>
                                    <div>
                                        <p class="leading-loose text-pricy-sm text-pricy-gray-200"
                                            x-text="swiper.description">
                                        </p>
                                    </div>
                                </div>
                                <div class="flex mt-32 space-x-3">
                                    <template x-for="(item, index) in totalSteps" :key=index>
                                        <div>
                                            <template x-if="item == currentStep">
                                                <div>
                                                    <svg width="21" height="9" viewBox="0 0 21 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="21" height="9" rx="4.5" fill="#FFD965" />
                                                    </svg>
                                                </div>
                                            </template>
                                            <template x-if="item != currentStep">
                                                <div>
                                                    <svg width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="9" height="9" rx="4.5" fill="#1B1A1F" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center w-1/2 h-full px-44 bg-pricy-yellow">
                                <div class="flex justify-center w-full h-80">
                                    <img :src="updateImage(swiper.image)" class="h-full" />
                                </div>
                                <div class="flex items-center justify-between w-full mt-32">
                                    <div>
                                        <template x-if="currentStep != 1">
                                            <div class="flex items-center space-x-1 cursor-pointer"
                                                @click="currentStep--">
                                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.1875 5.79419L12.4375 5.79419" stroke="#1B2124"
                                                        stroke-width="1.125" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.72485 1.27599L1.18735 5.79399L5.72485 10.3127"
                                                        stroke="#1B2124" stroke-width="1.125" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                                <p class="text-lg font-medium text-pricy-gray-400">Previous</p>

                                            </div>
                                        </template>
                                    </div>
                                    <template x-if="currentStep != totalSteps">
                                        <div class="flex items-center space-x-1 cursor-pointer" @click="currentStep++">
                                            <p class="text-lg font-medium text-pricy-gray-400">Next</p>
                                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.8125 11.7942H3.5625" stroke="#1B2124" stroke-width="1.125"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M10.2751 7.27599L14.8126 11.794L10.2751 16.3127"
                                                    stroke="#1B2124" stroke-width="1.125" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </template>
                                    <template x-if="currentStep == totalSteps">
                                        <a href="{{ url('create-experiment') }}"
                                            class="px-4 py-3 text-sm text-white rounded-lg bg-pricy-gray-400">Start Your
                                            Expirement</a>
                                    </template>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
<script>
    function updateImage(image) {
        return `{{ asset('${image}') }}`
    }

</script>
