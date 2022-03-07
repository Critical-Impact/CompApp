<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dog List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('dog.create')}}" class="btn btn-sm">
                        {{ __('Add') }}
                    </a>
                    <div class="overflow-x-auto">
                        <div class="divider"></div>
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        CRN
                                    </th>
                                    <th>
                                        Breed
                                    </th>
                                    <th>
                                        Team
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dogs as $dog)
                                <tr>
                                    <td>
                                        {{ $dog->name }}
                                    </td>
                                    <td>
                                        {{ $dog->crn }}
                                    </td>
                                    <td>
                                        {{ $dog->breed }}
                                    </td>
                                    <td>
                                        {{ $dog->title }}
                                    </td>
                                    <td>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("dog.edit", $dog->id) }}">Edit</a>
                                        <x-delete-button :action="route('dog.destroy', $dog->id)" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
