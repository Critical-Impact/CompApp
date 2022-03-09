<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $competition->name ." - Race View" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('competition.competition_races.index', ["competition" => $competition])}}" class="btn btn-sm">
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
                        <form method="POST" enctype="multipart/form-data" action="{{ action([\App\Http\Controllers\CompetitionController::class,"updateRaceViews"], ["competition" => $competition]) }}">
                            @csrf
                            <label for="active_race_id" class="label">
                                <span class="label-text">Active Race</span>
                            </label>
                            <select name="active_race_id" class="select select-bordered w-full max-w-xs">
                                <option value="" {{ old('active_race_id', $competition->active_race_id) == "" ? "selected" : "" }}>
                                    N/A
                                </option>
                                @foreach($races as $race)
                                <option value="{{ $race->id }}" {{ old('active_race_id', $competition->active_race_id) == $race->id ? "selected" : "" }}>
                                    {{ $race->race_no }}
                                </option>
                                @endforeach
                            </select>

                            <label for="active_heat" class="label">
                                <span class="label-text">Active Heat</span>
                            </label>
                            <input id="active_heat" name="active_heat" type="text" placeholder="Type here" value="{{ old('active_heat', $competition->active_heat) }}" class="input input-bordered w-full max-w-xs">

                            <label for="active_screen" class="label">
                                <span class="label-text">Active Screen</span>
                            </label>
                            <select name="active_screen" class="select select-bordered w-full max-w-xs">
                                <option value="" {{ old('active_screen', $competition->active_screen) == "" ? "selected" : "" }}>
                                    N/A
                                </option>
                                <option value="blank" {{ old('active_screen', $competition->active_screen) == "blank" ? "selected" : "" }}>
                                    Blank
                                </option>
                                <option value="race_view" {{ old('active_screen', $competition->active_screen) == "race_view" ? "selected" : "" }}>
                                    Lower Thirds
                                </option>
                                <option value="dog_view" {{ old('active_screen', $competition->active_screen) == "dog_view" ? "selected" : "" }}>
                                    Teams Intro
                                </option>
                            </select>

                            <div class="divider"></div>
                            <input type="submit" value="{{__('Save')}}" class="btn btn-sm"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
