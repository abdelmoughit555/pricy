            <div class="mt-6">
                <div>
                    <p class="font-semibold text-pricy-base text-pricy-gray-400">Step 2/3 :</p>
                </div>
                @if (!$isFetching)
                    <div class="w-full px-12 pt-12 pb-4 mt-8 rounded-lg bg-pricy-gray-100">
                        <div>
                            <div class="grid w-full grid-cols-6 overflow-y-auto gap-x-24">
                                <div>
                                    <p class="text-sm font-medium text-pricy-gray-400">Variants</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-pricy-gray-400">Split Cycle</p>
                                </div>
                                @if ($product)
                                    @foreach ($product['variants'] as $variant)
                                        <div>
                                            <p class="text-sm font-medium text-pricy-gray-300">{{ $variant['title'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <!--split 1 -->
                            @foreach ($tests as $testKey => $item)
                                <div class="grid items-center grid-cols-6 mt-8 gap-x-24">

                                    <div>
                                        <p class="text-sm font-medium text-pricy-gray-200">Current price</p>
                                    </div>
                                    <div x-data x-init="new Pikaday({ field: $refs.date })" class="relative">
                                        <input name=""
                                            class="w-full h-10 px-2 text-sm font-medium text-gray-700 border rounded outline-none appearance-none "
                                            x-ref="date" id="" wire:model.lazy="tests.{{ $testKey }}.date">

                                        <div class="absolute top-4 right-4">
                                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.29048 5.51685C3.63972 6.00078 4.36028 6.00078 4.70952 5.51685L7.32911 1.88706C7.74674 1.30836 7.33324 0.5 6.61958 0.5H1.38042C0.666761 0.5 0.253257 1.30836 0.670893 1.88705L3.29048 5.51685Z"
                                                    fill="#484A4F" fill-opacity="0.47" />
                                            </svg>
                                        </div>
                                    </div>
                                    @isset($item['variants'])
                                        @foreach ($item['variants'] as $variantKey => $variant)
                                            <div class="flex items-center h-10 space-x-2">
                                                <div class="flex items-center h-full pl-3 space-x-2 border rounded">
                                                    <div>
                                                        <p class="text-sm uppercase font-mediumtext-gray-700">
                                                            MAD
                                                        </p>
                                                    </div>
                                                    <div class="w-full h-full">
                                                        <input type="text"
                                                            class="w-full h-full text-sm font-medium text-gray-700 outline-none"
                                                            wire:model="tests.{{ $testKey }}.variants.{{ $variantKey }}.new_price">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col space-y-2">
                                                    <div
                                                        wire:click="incrementPrice({{ $testKey }}, {{ $variantKey }})">
                                                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M3.29048 0.49755C3.63972 0.0136235 4.36028 0.0136232 4.70952 0.49755L7.32911 4.12735C7.74674 4.70604 7.33324 5.5144 6.61958 5.5144H1.38042C0.666761 5.5144 0.253257 4.70604 0.670893 4.12735L3.29048 0.49755Z"
                                                                fill="#484A4F" />
                                                        </svg>

                                                    </div>
                                                    <div>
                                                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M3.29048 5.51685C3.63972 6.00078 4.36028 6.00078 4.70952 5.51685L7.32911 1.88706C7.74674 1.30836 7.33324 0.5 6.61958 0.5H1.38042C0.666761 0.5 0.253257 1.30836 0.670893 1.88705L3.29048 5.51685Z"
                                                                fill="#484A4F" fill-opacity="0.47" />
                                                        </svg>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset

                                </div>
                            @endforeach

                        </div>


                        <div class="w-32 mt-12">
                            <button class="w-full text-xs font-medium text-white bg-blue-600 rounded-lg h-11"
                                wire:click="addNewTest">+ Add
                                Test</button>
                        </div>
                    </div>
                    <div class="flex justify-end mt-12">
                        <div class="w-32 mt-12">
                            <button wire:click="finshSplitTest"
                                class="w-full text-xs font-medium text-white bg-blue-600 rounded-lg h-11"
                                wire:click="addNewTest">Finish</button>
                        </div>
                    </div>
            </div>
        @else
            <p>is fetching product</p>
            @endif
            </div>
