@extends('layouts.app')
@section('title', 'Kategorijos')
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
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Edit category
                                </h3>
                                <div class="mt-2">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('patch')
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

        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-1/2 lg:w-1/3 shadow-md sm:rounded-lg">
                <div class="flex justify-center py-4">
                    <h3 class="text-xl leading-6 font-medium text-gray-900">Categories</h3>
                </div>
                <table class="min-w-full sm:w-1/2 lg:w-1/3">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Name
                        </th>
                        <th scope="col" class="relative py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="relative py-3 px-6">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 text-md font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->name }}
                            </td>
                            <div class="flex">
                                <td class="py-4 px-1 text-sm font-medium text-right whitespace-nowrap">
                                    <button type="button"
                                            class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">
                                        Edit
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center py-2.5 px-5 mt-5 mx-5 text-center mr-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
        <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-1/2 lg:w-1/3">
            <div class="flex justify-center">
                <h3 class="text-xl leading-6 font-medium text-gray-900">Create category</h3>
            </div>
            <form action="{{ route('category.store') }}" method="POST" class="md:w-3/4 mx-auto space-y-4">
                @csrf
                <div class="shadow-md">
                    <div class="flex items-center bg-red-300 border-b border-red-500 rounded-t-md">
                        <label class="w-20 text-right mr-8 font-bold">Parent category</label>
                        <select name="parent_id"
                                class="block appearance-none bg-transparent bg-white border border-red-400 hover:border-red-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select parent category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center bg-red-300 rounded-b-md mb-5">
                        <label class="w-20 text-right mr-8 font-bold" for="name">Name</label>
                        <input
                            class="p-4 pl-0 bg-transparent placeholder-red-500 border-transparent focus:border-transparent focus:ring-0 border border-red-300"
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
                $('#CategoryModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function (e) {
                $('#CategoryModal').addClass('invisible');
            });
        });
    </script>
@endsection

