<div class="container w-2/3 h-full mx-auto mt-44" x-data="{ openProducts: false }">
    <div class="w-full ">

        <!--step 1 -->
        @if ($currentStep === 1)
            <livewire:experiments.split-test.first-step>
            @elseif ($currentStep === 2)
                @livewire('experiments.split-test.second-step')
        @endif
    </div>

</div>
