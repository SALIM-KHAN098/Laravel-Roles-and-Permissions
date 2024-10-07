<x-app-layout>
    <x-slot name="header">
        <div class="heading flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Create') }}
            </h2>
            @can('view users')
            <a href="{{ route('users.index') }}" type="button" class="px-3 mr-2 py-2 text-xs font-medium text-center text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-900 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-black-800">Back</a>
            @endcan

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="permission-table">
                        @include('include.alert')
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <h2 class="text-4xl font-bold dark:text-black mb-4">User Edit</h2>

                            <hr class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">

                            <div class="grid gap-6 mb-6 md:grid-cols-2 mt-4">
                                <div>
                                    <label for="name" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Name" />
                                    @error('name')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    <label for="email" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Email" />
                                    @error('email')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    <label for="password" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Password</label>
                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Password" />
                                    @error('password')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    <label for="confirm_password" class="mt-5 block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                                        Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Here Confirm Password" />
                                    @error('confirm_password')
                                    <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    <h3 class="mb-5 mt-5 font-semibold text-gray-900 dark:text-black">Role</h3>
                                    <div class="grid grid-cols-4 gap-4 mb-5">
                                        @if (count($roles)>0)
                                        @foreach ($roles as $role)
                                        <div class="items-center">
                                            <input  id="role-{{ $role->id }}" name="role[]" type="checkbox" value="{{ old('role[]', $role->name) }}" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white-700 dark:border-white-600">
                                            <label for="role-{{ $role->id }}" class="ms-2 text-sm font-medium text-white-900 dark:text-white-300">{{ $role->name }}</label>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                            <span class="font-medium">Permission Not Found...</span>
                                        </div>
                                        @endif
                                    </div>

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
