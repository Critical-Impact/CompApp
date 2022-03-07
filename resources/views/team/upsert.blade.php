<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $team->id ? __('Team - Edit') : __('Team - Add') }}
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
                        <form method="POST" enctype="multipart/form-data" action="{{ $team->id ? route('team.update',$team->id) : route('team.store') }}">
                            @csrf
                            @isset($team->id)
                                @method('PATCH')
                            @endisset
                            <label for="name" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input id="name" name="name" type="text" placeholder="Type here" value="{{ old('name', $team->name) }}" class="input input-bordered w-full max-w-xs">
                            <label for="description" class="label">
                                <span class="label-text">Description</span>
                            </label>
                            <input id="description" name="description" type="text" placeholder="Type here" value="{{ old('description', $team->description) }}" class="input input-bordered w-full max-w-xs">

                            <label for="seed_time" class="label">
                                <span class="label-text">Seed Time</span>
                            </label>
                            <input id="seed_time" name="seed_time" type="text" placeholder="Type here" value="{{ old('seed_time', $team->seed_time) }}" class="input input-bordered w-full max-w-xs">

                            <label for="best_time" class="label">
                                <span class="label-text">Best Time</span>
                            </label>
                            <input id="best_time" name="best_time" type="text" placeholder="Type here" value="{{ old('best_time', $team->best_time) }}" class="input input-bordered w-full max-w-xs">

                            <label for="club_id" class="label">
                                <span class="label-text">Team</span>
                            </label>
                            <select id="club_id" name="club_id" class="select select-bordered w-full max-w-xs">
                                @foreach ($clubs as $club)
                                    <option value="{{ $club->id }}" {{ old('club_id', $team->club_id) == $club->id ? "selected" : "" }}>
                                    {{ $club->name }}
                                    </option>
                                @endforeach
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
