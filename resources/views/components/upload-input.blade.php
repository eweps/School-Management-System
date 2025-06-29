@props(['disabled' => false, 'for' => '', 'accept' => ''])

<div>
    <label for="{{ $for }}" {{ $attributes->merge(['class' => 'w-full h-32 cursor-pointer block border-gray-300 bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm flex flex-col items-center justify-center']) }}>
         <div class="flex items-center gap-2">
            <svg class="w-6 text-gray-800 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11 11V8H13V11H16V13H13V16H11V13H8V11H11Z"></path></svg>
            <p class="text-gray-800 dark:text-gray-500">Click to Upload</p>
        </div>
        <p id="fileName" class="text-green-800 font-bold text-center"></p>
    </label>
    <input type="file" id="{{ $for }}" name="{{ $for }}" @disabled($disabled) accept="{{ $accept }}" class="hidden">
    
</div>