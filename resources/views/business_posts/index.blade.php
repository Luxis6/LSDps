@section('title', __('page.My Business Posts'))
@extends('layouts.app_business')

@section('content')
    <div class="flex justify-center py-4">
        <h1 class="text-3xl leading-4 font-medium text-gray-900">{{__('page.My Business Posts')}}</h1>
    </div>
    <div class="grid grid-cols-1 lg:justify-items-center">
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-3/5 w-auto overflow-y-auto">

            <div>
                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                    <thead class="bg-red-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            #
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            {{__('page.Title')}}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($business_posts as $business_post)
                        <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-2 table_row">
                            <td class="px-6"></td>
                            <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white hover:underline">
                                <a href="{{ route('business_posts.show', [$business_post->slug]) }}">{{$business_post->title}} </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    $('.table_row').each(function (i) {
        $("td:first", this).html(i+1);
    });
</script>
@endsection
