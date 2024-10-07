<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


<x-app-layout>
    <x-slot name="header">
        <div class="heading flex justify-between">
              <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>

         @can('create users')
         <a href="{{ route('users.create') }}" type="button" class="px-3 mr-2 py-2 text-xs font-medium text-center text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-900 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-black-800">Create</a>
         @endcan

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="permission-table">
                        @include('include.alert')

                        <h2 class="text-4xl font-bold dark:text-black mb-4">All User</h2>
                        <hr class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-4">

                        <table id="pagination-table">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="flex items-center">
                                            Id
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            S.No
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Name
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Email
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Role
                                        </span>
                                    </th>
                                    <th data-type="date" data-format="Month YYYY">
                                        <span class="flex items-center">
                                            Created at
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Updated at
                                        </span>
                                    </th>
                                    <th>
                                        <span class="flex items-center">
                                            Action
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users)>0)
                                 @foreach ($users as $key => $user)
                                    <tr>
                                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-black">{{ $user->id }}</td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y')  }}</td>
                                        <td>{{ $user->updated_at->format('d/m/Y') }}</td>
                                        <td class="flex">
                                            @can('edit users')
                                            <a href="{{ route('users.edit', $user->id) }}" type="button" class="px-3 mr-2 py-2 text-xs font-medium text-center text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-900 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-black-800">Edit</a>
                                            @endcan
                                            @can('delete users')
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach

                                @else
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-white-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">Not Found</span>
                                    </div>
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.tailwindcss.js"></script>

<script>
    if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#pagination-table", {
            paging: true,
            perPage: 10,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true,
        });
    }

</script>
