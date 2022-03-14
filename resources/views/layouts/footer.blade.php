<div class="bg-red-400 shadow">
        <div class="flex justify-center">
            <a href="{{route('home')}}" class="flex items-center py-5 px-2 text-white hover:text-white">
                <svg class="h-6 w-6 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="font-bold text-red-700">LSD</span>
            </a>
        </div>
        <p class="flex justify-center text-white">
            ©{{date("Y")}}
            <a href="{{route('home')}}" class="px-1">
                <span class="hover:text-red-600 hover:underline">
                     LSD
                </span>
            </a> | All rights reserved.
        </p>
</div>
