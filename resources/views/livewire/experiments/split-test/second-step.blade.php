<div class="flex flex-col mt-4">
    <div>
        <p class="font-semibold text-pricy-base text-pricy-gray-400">Step 2/3 :</p>
    </div>
    <div class="mt-6 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class=" bg-pricy-gray-100">
                        <tr>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                <p class="text-sm font-medium text-pricy-gray-400 ">Variants</p>
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                <p class="text-sm font-medium text-pricy-gray-400 w-52">Split Cycle</p>
                            </th>
                            @if ($product)
                                @foreach ($product['variants'] as $variant)
                                    <th scope="col"
                                        class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                        <p class="text-sm font-medium text-pricy-gray-300 w-52">
                                            {{ $variant['title'] }}
                                        </p>
                                    </th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tests as $testKey => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-sm font-medium text-pricy-gray-200 w-52">Current price</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="inline-block" x-data x-init="new Pikaday({ field: $refs.startAt })"
                                        class="relative">
                                        <div class="relative w-52">
                                            <input name=""
                                                class="w-full h-10 px-2 text-sm font-medium text-gray-700 border rounded outline-none appearance-none "
                                                x-ref="startAt" id=""
                                                wire:model.lazy="tests.{{ $testKey }}.start_at">

                                            <div class="absolute top-4 right-4">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.29048 5.51685C3.63972 6.00078 4.36028 6.00078 4.70952 5.51685L7.32911 1.88706C7.74674 1.30836 7.33324 0.5 6.61958 0.5H1.38042C0.666761 0.5 0.253257 1.30836 0.670893 1.88705L3.29048 5.51685Z"
                                                        fill="#484A4F" fill-opacity="0.47" />
                                                </svg>
                                            </div>
                                        </div>

                                    </div>

                                </td>
                                @isset($item['variants'])
                                    @foreach ($item['variants'] as $variantKey => $variant)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="inline-block">
                                                <div class="flex items-center h-10 space-x-2 w-52">
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
                                            </div>
                                        </td>
                                    @endforeach
                                @endisset
                            </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w-32 mt-6">
        <button class="w-full text-xs font-medium text-white bg-blue-600 rounded-lg h-11" wire:click="addNewTest">+
            Add
            Test</button>
    </div>
    <div class="flex justify-end mt-12">
        <div class="w-32 mt-6">
            <button wire:click="finshSplitTest"
                class="w-full text-xs font-medium text-white bg-blue-600 rounded-lg h-11"
                wire:click="addNewTest">Finish</button>
        </div>
    </div>
</div>
