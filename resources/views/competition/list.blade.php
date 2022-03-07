<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('competition.create')}}" class="btn btn-sm">
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
                                        Total # Races
                                    </th>
                                    <th>
                                        Logo
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competitions as $competition)
                                <tr>
                                    <td>
                                        {{ $competition->name }}
                                    </td>
                                    <td>
                                        {{ $competition->total_races }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($competition->logo_url) }}" width="100"/>
                                    </td>
                                    <td>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("competition.edit", $competition->id) }}">Edit</a>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("competition.competition_teams.index", $competition->id) }}">Teams</a>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("competition.competition_races.index", $competition->id) }}">Races</a>
                                        <x-delete-button :action="route('competition.destroy', $competition->id)" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $competitions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
