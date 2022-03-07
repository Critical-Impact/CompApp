<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $dog->id ? __('Dog - Edit') : __('Dog - Add') }}
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
                        <form method="POST" enctype="multipart/form-data" action="{{ $dog->id ? route('dog.update',$dog->id) : route('dog.store') }}">
                            @csrf
                            @isset($dog->id)
                                @method('PATCH')
                            @endisset
                            <label for="name" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input id="name" name="name" type="text" placeholder="Type here" value="{{ old('name', $dog->name) }}" class="input input-bordered w-full max-w-xs">

                            <label for="crn" class="label">
                                <span class="label-text">CRN</span>
                            </label>
                            <input id="crn" name="crn" type="text" placeholder="Type here" value="{{ old('crn', $dog->crn) }}" class="input input-bordered w-full max-w-xs">

                            <label for="breed" class="label">
                                <span class="label-text">Breed</span>
                            </label>
                            <input id="breed" name="breed" type="text" placeholder="Type here" value="{{ old('breed', $dog->breed) }}" class="input input-bordered w-full max-w-xs">

                            <label for="breed" class="label">
                                <span class="label-text">Title</span>
                            </label>
                            <input id="title" name="title" type="text" placeholder="Type here" value="{{ old('title', $dog->title) }}" class="input input-bordered w-full max-w-xs">

                            <label for="team_id" class="label">
                                <span class="label-text">Team</span>
                            </label>
                            <select id="team_id" name="team_id" class="select select-bordered w-full max-w-xs">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ old('team_id', $dog->team_id) == $team->id ? "selected" : "" }}>
                                    {{ $team->name }}
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
