<x-app-layout>
    <x-slot name="header">
        <div class="heading flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles Create') }}
            </h2>
            <a href="{{ route('articles.index') }}" type="button" class="px-3 mr-2 py-2 text-xs font-medium text-center text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-900 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-black-800">Back</a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="permission-table">
                        @include('include.alert')
                        <form action="{{ route('articles.store') }}" method="POST">
                            @csrf
                            <h2 class="text-4xl font-bold dark:text-black mb-4">Article Create</h2>

                            <hr class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">

                            <div class="grid gap-6 mb-6 md:grid-cols-2 mt-4">
                                <div>
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Title" />
                                    @error('title')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror


                                    <label for="author" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Author</label>
                                    <input type="text" id="author" name="author" value="{{ old('author') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Author" />
                                    @error('author')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror


                                    <label for="message" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your content</label>
                                    <textarea id="message" name="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

                                </div>

                            </div>
                            <button type="submit" class="bg-black text-white bg-black-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black-600 dark:hover:bg-black-700 dark:focus:ring-black-800">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
