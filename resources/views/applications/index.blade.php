@extends('layouts.app_business')
@section('title', 'Applications')
@section('content')
    <div class="flex justify-center py-4">
        <h1 class="text-3xl leading-4 font-medium text-gray-900">Applications</h1>
    </div>
    <div class="grid grid-cols-1 lg:justify-items-center">
    @foreach ($business_posts as $business_post)
    <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-3/5 w-auto overflow-y-auto">
        <div class="flex justify-center py-4">
            <h2 class="text-xl leading-4 font-medium text-gray-900">{{$business_post->title}}</h2>
        </div>
        <div>
            <table class="min-w-full sm:w-1/2 lg:w-1/3">
                <thead class="bg-red-50 dark:bg-gray-700">
                <tr>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Name
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Email
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Phone
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        CV
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        @if($application->business_post_id == $business_post->id)
                    <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-2 ">
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{App\Models\User::find($application->user_id)->name}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{App\Models\User::find($application->user_id)->email}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$application->phone}}
                        </td>
                        <td class="px-6 text-md font-medium text-red-600 hover:underline whitespace-nowrap dark:text-white">
                            <a href="{{$application->cv}}" download>
                                Download
                            </a>
                        </td>
                    </tr>
                        @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    </div>
@endsection

