<div class="container mx-auto mt-44">
    <div class="w-full ">
        @if ($currentStep === 1)
            @livewire('experiments.split-test.first-step')
        @else
            @livewire('experiments.split-test.second-step')
        @endif
    </div>
</div>
