@section('title', __('page.Users management'))
@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap justify-center">
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-2/5 w-full">
            <div class="flex justify-center py-4">
                <h1 class="text-xl leading-4 font-medium text-gray-900">{{__('page.Verified Users')}}</h1>
            </div>
            <div id="verified">
                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                    <thead class="bg-red-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            #
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            {{__('page.Name')}}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($verified as $user)
                        <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-2">
                            <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$user->id}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                {{$user->name}}
                            </td>
                        </tr>
                    @empty
                        <h3 class="flex justify-center font-medium">
                            {{__('page.No users currently')}}
                        </h3>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-2/5 w-full">
            <div class="flex justify-center py-4">
                <h1 class="text-xl leading-4 font-medium text-gray-900">{{__('page.Unverified Users')}}</h1>
            </div>
            <div id="unverified">
                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                    <thead class="bg-red-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            #
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            {{__('page.Name')}}
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($waiting as $user)
                        <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-2">
                            <td class="px-6 text-md font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                                {{$user->id}}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-white">
                                {{$user->name}}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{route('admin.verify.user', $user->id)}}"
                                   class="focus:outline-none text-white text-sm py-2.5 px-3 font-medium rounded-md bg-green-500 hover:bg-green-600 hover:shadow-md">
                                    {{__('page.buttons.Verify')}}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <h3 class="flex justify-center font-medium">
                            {{__('page.No users currently')}}
                        </h3>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
