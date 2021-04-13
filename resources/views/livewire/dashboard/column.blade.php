<tr>
    <td class="px-6 py-4 whitespace-nowrap">
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex flex-col space-y-1">
            <p class="text-sm text-pricy-gray-400">{{ $splitTest->title }}</p>
            <div class="flex space-x-4">
                <p class="text-pricy-xs text-pricy-gray-500">Edit</p>
                <p class="text-pricy-xs text-pricy-gray-500">View insight</p>
                <p class="text-pricy-xs text-pricy-gray-500">View Product</p>
            </div>
        </div>

    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($splitTest->status === 'pending')
            <div class="flex items-center space-x-1 ">
                <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                <p class="text-sm text-yellow-500 capitalize">Pending</p>
            </div>
        @elseif($splitTest->status === 'running')
            <div class="flex items-center space-x-1 ">
                <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                <p class="text-sm text-green-600 capitalize">Active</p>
            </div>
        @else
            <div class="flex items-center space-x-1 ">
                <div class="w-2 h-2 bg-red-600 rounded-full"></div>
                <p class="text-sm text-red-600 capitalize">Finished</p>
            </div>
        @endif
    </td>
    <td class="px-10 py-4 text-sm text-pricy-gray-400 whitespace-nowrap">
        {{ $splitTest->split_cycles_count }}
    </td>
    <td class="px-6 py-4 text-sm text-pricy-gray-400 whitespace-nowrap">
        Split Test
    </td>
    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
        3402
    </td>
    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
        @if ($splitTest->orders_sum_quantity)
            {{ $splitTest->orders_sum_quantity }}
        @else
            0
        @endif
    </td>
    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
        {{ $splitTest->deadline }}
    </td>
    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
        <a href="{{ route('splittest.show', ['splitTest' => $splitTest->uuid]) }}"
            class="h-10 px-4 text-xs text-white bg-blue-600 rounded">Set
            winner</a>
    </td>
    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
        <svg width="5" height="20" viewBox="0 0 5 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2.93795 7.69642C4.07386 7.69642 4.98259 8.62731 4.98259 9.79093C4.98259 10.9545 4.07386 11.8854 2.93795 11.8854C1.80204 11.8854 0.893311 10.9545 0.893311 9.79093C0.893311 8.62731 1.80204 7.69642 2.93795 7.69642ZM0.893311 2.34378C0.893311 3.5074 1.80204 4.43829 2.93795 4.43829C4.07386 4.43829 4.98259 3.5074 4.98259 2.34378C4.98259 1.18016 4.07386 0.249268 2.93795 0.249268C1.80204 0.249268 0.893311 1.18016 0.893311 2.34378ZM0.893311 17.2381C0.893311 18.4017 1.80204 19.3326 2.93795 19.3326C4.07386 19.3326 4.98259 18.4017 4.98259 17.2381C4.98259 16.0745 4.07386 15.1436 2.93795 15.1436C1.80204 15.1436 0.893311 16.0745 0.893311 17.2381Z"
                fill="#1B1A1F" />
        </svg>

    </td>
</tr>
