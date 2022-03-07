<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition Team List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200" x-data="{ team_id: '1', get_team() { return '{{action([\App\Http\Controllers\CompetitionTeamController::class,'add'], ["competition" => $competition])}}' + '?id=' + this.team_id} }">
                    <a href="{{route('competition.index')}}" class="btn btn-sm">
                        {{ __('Back') }}
                    </a>
                    <select x-model="team_id" id="team_id" name="team_id" class="select select-bordered w-full max-w-xs">
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                    <a x-bind:href="get_team"  class="btn btn-sm btn-primary">
                        {{ __('Add') }}
                    </a>
                    <div class="overflow-x-auto">
                        <div class="divider"></div>
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>
                                        Team Name
                                    </th>
                                    <th>
                                        Points
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competition->competition_teams as $competition_team)
                                <tr>
                                    <td>
                                        {{ $competition_team->team->name }}
                                    </td>
                                    <td>
                                        {{ $competition_team->points() }}
                                    </td>
                                    <td>
                                        <x-delete-button :action="route('competition.competition_teams.destroy',['competition' => $competition->id, 'competition_team' => $competition_team->id])" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
