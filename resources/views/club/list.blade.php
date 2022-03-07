<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Club List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('club.create')}}" class="btn btn-sm">
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
                                        Colour #1
                                    </th>
                                    <th>
                                        Colour #2
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clubs as $club)
                                <tr>
                                    <td>
                                        {{ $club->name }}
                                    </td>
                                    <td>
                                        <span class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow" style="background: {{ $club->color_one }}; color: white; width:45px; height:45px;"></span>
                                    </td>
                                    <td>
                                        <span class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow" style="background: {{ $club->color_two }}; color: white; width:45px; height:45px;"></span>
                                    </td>
                                    <td>
                                        <img src="{{ asset($club->url) }}" width="100"/>
                                    </td>
                                    <td>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("club.edit", $club->id) }}">Edit</a>
                                        <x-delete-button :action="route('club.destroy', $club->id)" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clubs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
