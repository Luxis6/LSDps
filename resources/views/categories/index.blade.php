@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="flex flex-wrap justify-center">
        <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
             aria-modal="true" id="CategoryModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h1 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Edit category
                                </h1>
                                <div class="mt-2">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div>
                                            <div>
                                                <input type="text" name="name" class="rounded" value=""
                                                       placeholder="name" required>
                                            </div>
                                        </div>
                                        <div class="bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                Update
                                            </button>
                                            <button type="button"
                                                    class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-100 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Close
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col bg-red-100 rounded-lg shadow-md m-6 lg:w-2/5 md:w-3/5 w-full">
            <div class="flex justify-center py-4">
                <h1 class="text-xl leading-4 font-medium text-gray-900">Categories</h1>
            </div>
            <div>
                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                    <thead class="bg-red-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Name
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-red-100 border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 grid py-2 lg:grid-cols-2 md:grid-cols-2">
                            <td class="px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if($category->parent_id == NULL)
                                    <i class="text-gray-400"></i>
                                    {{ $category->name }}
                                @else
                                    <i class="text-gray-400">sub</i>
                                    {{ $category->name }}
                                @endif
                            </td>
                            <td class="text-sm font-medium lg:text-right lg:flex lg:justify-end md:flex md:justify-end">
                                <button type="button"
                                        class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mx-5 font-medium rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-md"
                                        data-target="#CategoryModal" data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}">
                                    Edit
                                </button>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg hover:shadow-md text-sm inline-flex items-center py-2.5 px-5 mx-5 text-center">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex flex-col bg-red-100 rounded-lg shadow-md w-auto h-auto m-6 overflow-hidden md:w-1/2 lg:w-2/5 h-64">
            <div class="flex justify-center border border-b-gray-300">
                <h1 class="py-4 text-xl leading-6 font-medium text-gray-900">Create category</h1>
            </div>
            <form action="{{ route('category.store') }}" method="POST" class="md:w-3/4 mx-auto space-y-4">
                @csrf
                <div class="px-4">
                    <div class="flex items-center rounded-t-md">
                        <label class="w-20 text-right mr-8 font-bold">Parent category</label>
                        <select name="parent_id"
                                class="lg:w-52 w-40 block appearance-none bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select parent category</option>
                            @foreach ($categories as $category)
                                @if($category->parent_id == NULL)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center rounded-b-md mb-5">
                        <label class="w-20 text-right mr-8 font-bold" for="name">Name</label>
                        <input
                            class="rounded lg:w-52 w-40"
                            type="text" name="name" value="{{ old('name') }}" placeholder="name" required>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                            class="w-20 block rounded bg-transparent bg-green-300 hover:bg-green-500 py-2 font-bold shadow">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.openModal').on('click', function (e) {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var url = "{{ url('categories/update') }}/" + id;
                $('#CategoryModal form').attr('action', url);
                $('#CategoryModal form input[name="name"]').val(name);
                $('#CategoryModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function (e) {
                $('#CategoryModal').addClass('invisible');
            });
        });
    </script>
@endsection

