<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teams List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('team.create')}}" class="btn btn-sm">
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
                                        Description
                                    </th>
                                    <th>
                                        Club Name
                                    </th>
                                    <th>
                                        Times
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php /** @var App\Models\Team $team */ @endphp
                                @foreach ($teams as $team)
                                <tr>
                                    <td>
                                        {{ $team->name }}
                                    </td>
                                    <td>
                                        {{ $team->description }}
                                    </td>
                                    <td>
                                        {{ $team->club->name }}
                                    </td>
                                    <td>
                                        Seed Time: {{ $team->seed_time }}<br/>
                                        Best Time: {{ $team->best_time }}
                                    </td>
                                    <td>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("team.edit", $team->id) }}">Edit</a>
                                        <x-delete-button :action="route('team.destroy', $team->id)" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{ $teams->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
