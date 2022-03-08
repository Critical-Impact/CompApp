<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Competition - '.$competition->name.' - Race #'.$race->race_no.' - Heat #'.$heat.' - Results' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('competition.competition_races.index', ['competition' => $competition, 'race' => $race])}}" class="btn btn-sm">
                        {{ __('Back') }}
                    </a>
                    <div class="form-control w-full">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" enctype="multipart/form-data" action="{{ action([\App\Http\Controllers\CompetitionHeatResultController::class, 'update'],["competition" => $race->competition, "race" => $race, "heat" => $heat]) }}">
                            @csrf

                            <div class="flex flex-row">
                                <div class="basis-1/2  m-4">
                                    <label for="best_time_one" class="label">
                                        <span class="label-text">Left Team - {{ $team_one->name }}</span>
                                    </label>
                                    <label for="team_one_seconds" class="label">
                                        <span class="label-text">Time</span>
                                    </label>
                                    <input id="team_one_seconds" name="team_one_seconds" type="number" step="any" placeholder="Time(in seconds)" value="{{ old('team_one_seconds', $heat_result->team_one_seconds) }}" class="input input-bordered w-full max-w-xs">

                                    <label for="team_one_status" class="label">
                                        <span class="label-text">Result</span>
                                    </label>
                                    <select name="team_one_status" class="select select-bordered w-full max-w-xs">
                                        <option value="N/A" {{ old('team_one_status', $heat_result->team_one_status) == "N/A" ? "selected" : "" }}>
                                        N/A
                                        </option>
                                        <option value="WIN" {{ old('team_one_status', $heat_result->team_one_status) == "WIN" ? "selected" : "" }}>
                                        WIN
                                        </option>
                                        <option value="DNF" {{ old('team_one_status', $heat_result->team_one_status) == "DNF" ? "selected" : "" }}>
                                        DNF
                                        </option>
                                        <option value="LOSS" {{ old('team_one_status', $heat_result->team_one_status) == "LOSS" ? "selected" : "" }}>
                                        LOSS
                                        </option>
                                    </select>
                                </div>
                                <div class="basis-1/2  m-4">
                                    <label for="best_time_one" class="label">
                                        <span class="label-text">Left Team - {{ $team_two->name }}</span>
                                    </label>
                                    <label for="team_two_seconds" class="label">
                                        <span class="label-text">Time</span>
                                    </label>
                                    <input id="team_two_seconds" name="team_two_seconds" type="number" step="any" placeholder="Time(in seconds)" value="{{ old('team_two_seconds', $heat_result->team_two_seconds) }}" class="input input-bordered w-full max-w-xs">

                                    <label for="team_two_status" class="label">
                                        <span class="label-text">Result</span>
                                    </label>
                                    <select name="team_two_status" class="select select-bordered w-full max-w-xs">
                                        <option value="N/A" {{ old('team_two_status', $heat_result->team_two_status) == "N/A" ? "selected" : "" }}>
                                        N/A
                                        </option>
                                        <option value="WIN" {{ old('team_two_status', $heat_result->team_two_status) == "WIN" ? "selected" : "" }}>
                                        WIN
                                        </option>
                                        <option value="DNF" {{ old('team_two_status', $heat_result->team_two_status) == "DNF" ? "selected" : "" }}>
                                        DNF
                                        </option>
                                        <option value="LOSS" {{ old('team_two_status', $heat_result->team_two_status) == "LOSS" ? "selected" : "" }}>
                                        LOSS
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="divider"></div>
                            <input type="submit" value="{{__('Save')}}" class="btn btn-sm"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
