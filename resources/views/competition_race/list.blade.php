<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition Race List') }} - {{ $competition->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('competition.index')}}" class="btn btn-sm">
                        {{ __('Back') }}
                    </a>
                    <a href="{{route('competition.competition_races.create', ['competition' => $competition])}}" class="btn btn-sm">
                        {{ __('Add') }}
                    </a>
                    <a href="{{ action([\App\Http\Controllers\CompetitionController::class, "editRaceViews"], ['competition' => $competition]) }}" class="btn btn-sm">
                        {{ __('Update Race View') }}
                    </a>
                    <a target="_blank" href="{{ action([\App\Http\Controllers\RaceViewController::class, "competition"], ['competition' => $competition]) }}" class="btn btn-sm">
                        {{ __('Open Race View') }}
                    </a>
                    <div class="overflow-x-auto">
                        <div class="divider"></div>
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th>
                                        Left Team
                                    </th>
                                    <th>
                                        Right Team
                                    </th>
                                    <th>
                                        Race #
                                    </th>
                                    <th>
                                        Division
                                    </th>
                                    <th>
                                        Total Heats
                                    </th>
                                    <th>
                                        Heats
                                    </th>
                                    <th width="100">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competition->races as $race)
                                <tr>
                                    <td>
                                        {{ $race->team_one->name }}
                                    </td>
                                    <td>
                                        {{ $race->team_two->name }}
                                    </td>
                                    <td>
                                        {{ $race->race_no }}
                                    </td>
                                    <td>
                                        {{ $race->division }}
                                    </td>
                                    <td>
                                        {{ $race->total_heats }}
                                    </td>
                                    <td>
                                        @for ($heat = 1; $heat <= $race->total_heats; $heat++)
                                            <a style="margin-bottom:10px;" class="btn btn-xs" href="{{ action([\App\Http\Controllers\CompetitionHeatResultController::class, 'edit'],["competition" => $race->competition, "race" => $race, "heat" => $heat]) }}">Heat {{ $heat }}</a>
                                            <br/>
                                        @endfor
                                    </td>
                                    <td>
                                        <a style="margin-bottom:10px;" class="btn btn-sm" href="{{ route("competition.competition_races.edit", ['competition' => $competition, 'competition_race' => $race]) }}">Edit</a>
                                        <x-delete-button :action="route('competition.competition_races.destroy',['competition' => $competition->id, 'competition_race' => $race->id])" />
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
