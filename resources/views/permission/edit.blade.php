<x-app-layout>
    <x-slot name="header">
        <div class="heading flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions Edit') }}
            </h2>
        <a href="{{ route('permissions.index') }}" type="button" class="px-3 mr-2 py-2 text-xs font-medium text-center text-white bg-gray-900 rounded-lg hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-900 dark:bg-gray-900 dark:hover:bg-gray-900 dark:focus:ring-black-900">Back</a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="permission-table">
                        @include('include.alert')
                        <form action="{{ route('permissions.update', $permission->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <h2 class="text-4xl font-bold dark:text-black mb-4">Permissions Edit</h2>

                            <hr class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">

                            <div class="grid gap-6 mb-6 md:grid-cols-2 mt-4">
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Permission Name</label>
                                    <input type="text" id="first_name" name="name" value="{{ old('name', $permission->name) }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Permission" />
                                    @error('name')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                      </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="bg-black text-white bg-black-700 hover:bg-black-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black-600 dark:hover:bg-black-700 dark:focus:ring-black-800">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
