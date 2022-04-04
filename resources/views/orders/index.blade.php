@section('title', 'Orders')
@extends('layouts.app')
@section('content')
    <div class="flex justify-center flex-col lg:flex-row">
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-3/5 w-auto overflow-y-auto">
            <div class="flex justify-center py-4">
                <h2 class="text-xl leading-4 font-medium text-gray-900">My orders</h2>
            </div>
            <table class="min-w-full sm:w-1/2 lg:w-1/3">
                <thead class="bg-red-50 dark:bg-gray-700">
                <tr>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Post Title
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Order Requirement
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($user_orders as $order)
                    <tr>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$order->title}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$order->requirement}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">
                            <h2 class="font-medium text-xl">I haven't ordered anything</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-3/5 w-auto overflow-y-auto">
            <div class="flex justify-center py-4">
                <h2 class="text-xl leading-4 font-medium text-gray-900">Ordered services from my posts</h2>
            </div>
            <table class="min-w-full sm:w-1/2 lg:w-1/3">
                <thead class="bg-red-50 dark:bg-gray-700">
                <tr>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Post Title
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Order Requirement
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Username
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Email
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($user_posts as $post)
                    <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-2 ">
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->title}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->requirement}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{\App\Models\User::find($post->user_id)->name}}
                        </td>
                        <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{\App\Models\User::find($post->user_id)->email}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">
                            <h2 class="font-medium text-xl">No ordered services </h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
