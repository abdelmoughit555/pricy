<div class="flex flex-col h-full">
    @foreach ($swipers as $swiper)
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
    @endforeach

    <div class="flex flex-col justify-end flex-1">
        <div class="flex items-center justify-between">
            <div class="flex space-x-1">
                @for ($i = 1; $i <= $totalStep; $i++)
                    <div class="w-2 h-2 rounded-full  @if ($i===$currentStep) bg-pricy-gray-400 @else bg-gray-100 @endif"></div>
                @endfor

            </div>
            <div class="flex space-x-2">
                <div class="flex items-center justify-center w-4 h-4 rounded-full bg-pricy-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 24 24"
                        class="text-white fill-current">
                        <path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z" />
                    </svg>
                </div>
                <div class="flex items-center justify-center w-4 h-4 rounded-full bg-pricy-gray-400"
                    wire:click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 24 24"
                        class="text-white fill-current">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
