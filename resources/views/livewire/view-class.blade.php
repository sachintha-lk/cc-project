<div>
    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
        {{ $class->class_name }}
    </h2>
    <div class="block w-full overflow-x-auto mt-2 p-4 bg-white">
        <livewire:show-students-in-class :class_id="$class->id" />
        
    </div>
    <div  class="block w-full overflow-x-auto mt-2 p-4 bg-white">
        <livewire:modules :classId="$class->id" />
    </div>
</div>
