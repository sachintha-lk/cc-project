<div class="flex justify-center" wire:poll="1000ms">

    <div class="flex items-center justify-center w-12 h-12 mr-2 rounded-full bg-yellow-100 md:w-16 md:h-16">
        <div class="text-2xl font-bold text-yellow-600 md:text-3xl"> {{ $days }}</div>
    </div>
    <div class="flex items-center justify-center w-12 h-12 mr-2 rounded-full bg-yellow-100 md:w-16 md:h-16">
        <div class="text-2xl font-bold text-yellow-600 md:text-3xl"> {{ $hours }}</div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="text-xs font-bold tracking-widest text-gray-600 uppercase">Hours</div>
    </div>
    <div class="flex items-center justify-center w-12 h-12 mr-2 rounded-full bg-yellow-100 md:w-16 md:h-16">
        <div class="text-2xl font-bold text-yellow-600 md:text-3xl"> {{ $minutes }}</div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="text-xs font-bold tracking-widest text-gray-600 uppercase">Minutes</div>
    </div>
    <div class="flex items-center justify-center w-12 h-12 mr-2 rounded-full bg-yellow-100 md:w-16 md:h-16">
        <div class="text-2xl font-bold text-yellow-600 md:text-3xl"> {{ $seconds }}</div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="text-xs font-bold tracking-widest text-gray-600 uppercase">Seconds</div>
    </div>
    <div class="flex flex-col items-center justify-center">
        <div class="text-xs font-bold tracking-widest text-gray-600 uppercase">Remaining</div>
    </div>
</div>
