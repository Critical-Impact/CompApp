<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $race->id ? 'Competition - '.$competition->name.' - Edit' : 'Competition Race - '.$competition->name.' - Add' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                        <form method="POST" enctype="multipart/form-data" action="{{ $race->id ? route('competition.competition_races.update',["competition" => $race->competition_id, "competition_race" => $race]) : route('competition.competition_races.store', ['competition' => $competition->id]) }}">
                            @csrf
                            @isset($race->id)
                                @method('PATCH')
                            @endisset
                            <label for="team_one_id" class="label">
                                <span class="label-text">Left Team</span>
                            </label>
                            <select id="team_one_id" name="team_one_id" class="select select-bordered w-full max-w-xs">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team_one_id', $team->team_one_id) == $team->id ? "selected" : "" }}>
                                    {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="team_two_id" class="label">
                                <span class="label-text">Right Team</span>
                            </label>
                            <select id="team_one_id" name="team_two_id" class="select select-bordered w-full max-w-xs">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team_two_id', $team->team_two_id) == $team->id ? "selected" : "" }} >
                                    {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="race_no" class="label">
                                <span class="label-text">Race #</span>
                            </label>
                            <input id="race_no" name="race_no" type="text" placeholder="Type here" value="{{ old('race_no', $race->race_no) }}" class="input input-bordered w-full max-w-xs">

                            <label for="division" class="label">
                                <span class="label-text">Division</span>
                            </label>
                            <input id="division" name="division" type="text" placeholder="Type here" value="{{ old('division', $race->division) }}" class="input input-bordered w-full max-w-xs">

                            <label for="total_heats" class="label">
                                <span class="label-text">Total Heats</span>
                            </label>
                            <input id="total_heats" name="total_heats" type="text" placeholder="Type here" value="{{ old('heat', $race->total_heats) }}" class="input input-bordered w-full max-w-xs">

                            <div class="divider"></div>
                            <input type="submit" value="{{__('Save')}}" class="btn btn-sm"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
