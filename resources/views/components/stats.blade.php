 @props(['heading' => '', 'value' => ''])
 
 <div
     class="shadow border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg  py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.02] dark:text-neutral-200">
     <div class="flex-shrink-0">
         <p class="font-semibold">{{ $value }}</p>
         <h3 class="text-neutral-500 dark:text-neutral-400 font-medium text-sm">{{ $heading }}</h3>
     </div>

     <div class="flex-shrink-0">
         <i {{ $attributes->merge(['class' => 'py-2 px-3 rounded-lg block mb-3 sm:mb-0']) }}></i>
     </div>
 </div>
