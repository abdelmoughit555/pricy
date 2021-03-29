<div class="container mx-auto">
    <div class="w-full">
        @if ($currentStep === 1)
            @livewire('experiments.split-test.first-step')
        @else
            @livewire('experiments.split-test.second-step')
        @endif
        <hr class="mt-12 mb-6">
        <div class="px-32">
            <div class="flex justify-end mt-12 space-x-4">
                @if ($currentStep > 1)
                    <div>
                        <div class="w-32 ">
                            <button wire:click="previousStep"
                                class="w-full text-xs font-medium bg-gray-300 rounded-lg text-pricy-gray-200 h-11"
                                wire:click="addNewTest">
                                Previous
                            </button>
                        </div>
                    </div>
                @endif
                @if ($currentStep === $totalSteps)
                    <div class="w-32">
                        <button wire:click="$emitUp('finshSplitTest')"
                            class="w-full text-xs font-medium text-white rounded-lg bg-pricy-gray-400 h-11"
                            wire:click="addNewTest">
                            Finish
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
