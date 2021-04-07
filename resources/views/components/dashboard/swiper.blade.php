<div class="flex flex-col h-full" x-data="{currentStep:1, totalSteps: 3, swipers: [
    {
        name: 'Manage your prices',
        image: '{{ asset('images/guy.png') }}',
        description: 'With our Artificial intelligence you can create, optimize, and manage your prices. You can instruct the our Artificial intelligence to optimise on margin, and watch your margins grow'
    },
   {
        name: 'One source of truth',
        image: '{{ asset('images/woman.png') }}',
        description: 'Set dynamic pricing rules to make sure that your store always has the most competitive and profitable prices.'
    },
    {
        name: 'the right decision every time',
        image: '{{ asset('images/clothes.png') }}',
        description: 'an unlimited amount of competitor product price & stock availability in with Prisyncs price tracking app.'
    }
]}">

    <template x-for="(swipe, index) in swipers" :key="index">
        <div x-show="index + 1 === currentStep">
            <div>
                <div class="w-40">
                    <div class="flex justify-center w-full">
                        <img :src="swipe.image" class="w-full h-full" />
                    </div>
                </div>

                <div class="mt-4">
                    <h2 class="text-lg font-semibold text-pricy-gray-400" x-text="swipe.name"></h2>
                </div>
                <div class="mt-2">
                    <p class="text-xs text-pricy-gray-200" x-text="swipe.description"></p>
                </div>
            </div>
        </div>
    </template>
    {{-- @foreach ($swipers as $swiper)
        @if ($loop->index + 1 == $currentStep)
            <div class="flex justify-center w-40">
                <img src=" {{ asset($swiper['image']) }}" class="w-full h-full" />
            </div>
            <div class="mt-4">
                <h2 class="text-lg font-semibold text-pricy-gray-400">{{ $swiper['name'] }}</h2>
            </div>
            <div class="mt-2">
                <p class="text-xs text-pricy-gray-200">{{ $swiper['description'] }}</p>
            </div>
        @endif
    @endforeach --}}

    <div class="flex flex-col justify-end flex-1">
        <div class="flex items-center justify-between">
            <div class="flex space-x-1">
                <template x-for="n in totalSteps" :key="n">
                    <div class="w-2 h-2 rounded-full" :class=" n === currentStep ? 'bg-pricy-gray-400' : 'bg-gray-100'">
                    </div>
                </template>
            </div>
            <div class="flex space-x-2">
                <div class="flex items-center justify-center w-4 h-4 rounded-full bg-pricy-gray-400"
                    @click="currentStep > totalSteps ?  currentStep-- : currentStep = totalSteps">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 24 24"
                        class="text-white fill-current">
                        <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
                    </svg>
                </div>
                <div class="flex items-center justify-center w-4 h-4 rounded-full bg-pricy-gray-400"
                    @click="currentStep < totalSteps ? currentStep++ : currentStep = 1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 24 24"
                        class="text-white fill-current">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
