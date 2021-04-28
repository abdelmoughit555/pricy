@props(['key', 'rand', 'startAt', 'endAt'])

<div class="inline-block" x-data x-init="new Litepicker({
    element: document.getElementById('{{ $rand }}'),
    singleMode: false,
    format: 'YYYY-MM-DD',
    startDate: '{{ $startAt }}',
    endDate: '{{ $endAt }}',
    setup: (picker) => {
        picker.on('selected', (date1, date2) => {
            $wire.setCycle([date1['dateInstance'], date2['dateInstance']], '{{ $key }}')
        });
    },
})" class="relative">

    <div class="relative w-52">
        <input id="{{ $rand }}"
            class="w-full h-10 px-2 text-sm font-medium text-gray-700 border rounded outline-none appearance-none ">
    </div>
</div>
<style>
    .litepicker .container__days .day-item.is-start-date {
        background-color: #FFD965;
        color: black
    }

    .litepicker .container__days .day-item.is-in-range {
        background-color: #ffecb2;
    }

    .litepicker .container__days .day-item.is-end-date {
        background-color: #FFD965;
        color: black
    }

</style>
