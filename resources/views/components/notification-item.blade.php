 @props(['message' => '', 'time' => '', 'duration' => '' , 'url' => '#'])
 
 <a href="{{ $url }}" class="block w-full">
 <div {{ $attributes->merge(['class'=>"border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg  py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.01] dark:text-neutral-200"]) }}>
   
         <div class="flex items-center gap-x-3">
            <time class="flex-shrink-0 text-secondary">
                <i class="ri-information-line me-1"></i>{{ $time }}
            </time>
            <p class="font-semibold flex-shrink-0">{{ $message }}</p>
         </div>
         

         <div class="text-sm text-neutral-600 dark:text-neutral-500">
            {{ $duration }}
         </div>
 </div>
 </a>
