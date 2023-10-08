<div>
    <div wire:poll.1000ms>
        {{ \Carbon\Carbon::parse($time)->diffForHumans() }}
    </div>

</div>
