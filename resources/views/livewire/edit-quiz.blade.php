<div class="w-3/4">

    <div class="m-2">
        <label for="name" class="block text-sm font-medium text-gray-700">Quiz Name</label>
        <input type="text" id="name" name="name" wire:model.defer="quiz.name"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.name" class="mt-2"/>
    </div>

    <div class="m-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" wire:model.defer="quiz.description"
                  class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                  focus:border-yellow-500 sm:text-sm">
        </textarea>
        <x-input-error for="quiz.description" class="mt-2"/>
    </div>


    <div class="m-2">
        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
        <input type="datetime-local" id="start_time" name="start_time" wire:model.defer="quiz.valid_from"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.valid_from" class="mt-2"/>
    </div>


    <div class="m-2">
        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
        <input type="datetime-local" id="end_time" name="end_time" wire:model.defer="quiz.valid_upto"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.valid_upto" class="mt-2"/>
    </div>
                 Update Quiz Button
    <div class="mt-4">
        <button wire:click="saveQuiz"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Save Quiz
        </button>
    </div>

</div>
