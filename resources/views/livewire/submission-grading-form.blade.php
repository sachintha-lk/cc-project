<x-dialog-modal wire:model="showModal">
    <x-slot name="title">
        {{ $submissionGradeId ? 'Edit Submission Grading' : 'Grade Submission' }}
    </x-slot>

    <x-slot name="content">
        <div class="mb-4">
            <x-label for="grade" value="Grade" />
            <x-input id="grade" class="block mt-1 w-full" type="number" wire:model.defer="grade" />
            @error('grade') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mb-4">
            <x-label for="comment" value="Comment" />
            <textarea id="comment" class="block mt-1 w-full" wire:model.defer="comment"></textarea>
            @error('comment') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
            Cancel
        </x-secondary-button>

        @if ($submissionGradeId)
            <x-danger-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                Update
            </x-danger-button>
        @else
            <x-danger-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                Create
            </x-danger-button>
        @endif
    </x-slot>
</x-dialog-modal>

