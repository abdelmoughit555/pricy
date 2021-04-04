<div class="flex flex-col mt-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class=" bg-pricy-gray-100">
                        <tr>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Test Status
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Split Units
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Strategy
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Sessions
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Orders
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Deadline
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                Actions

                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-xs font-medium tracking-wider text-left uppercase text-pricy-400">
                                <svg width="5" height="20" viewBox="0 0 5 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.93795 7.69642C4.07386 7.69642 4.98259 8.62731 4.98259 9.79093C4.98259 10.9545 4.07386 11.8854 2.93795 11.8854C1.80204 11.8854 0.893311 10.9545 0.893311 9.79093C0.893311 8.62731 1.80204 7.69642 2.93795 7.69642ZM0.893311 2.34378C0.893311 3.5074 1.80204 4.43829 2.93795 4.43829C4.07386 4.43829 4.98259 3.5074 4.98259 2.34378C4.98259 1.18016 4.07386 0.249268 2.93795 0.249268C1.80204 0.249268 0.893311 1.18016 0.893311 2.34378ZM0.893311 17.2381C0.893311 18.4017 1.80204 19.3326 2.93795 19.3326C4.07386 19.3326 4.98259 18.4017 4.98259 17.2381C4.98259 16.0745 4.07386 15.1436 2.93795 15.1436C1.80204 15.1436 0.893311 16.0745 0.893311 17.2381Z"
                                        fill="#1B1A1F" />
                                </svg>

                            </th>
                        </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($splitTests as $splitTest)
                            @livewire('dashboard.column', ['splitTest' => $splitTest], key($splitTest->id))
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
