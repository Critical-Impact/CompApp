<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $competition->id ? __('Competition - Edit') : __('Competition - Add') }}
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
                        <form method="POST" enctype="multipart/form-data" action="{{ $competition->id ? route('competition.update',$competition->id) : route('competition.store') }}">
                            @csrf
                            @isset($competition->id)
                                @method('PATCH')
                            @endisset
                            <label for="name" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input id="name" name="name" type="text" placeholder="Type here" value="{{ old('name', $competition->name) }}" class="input input-bordered w-full max-w-xs">

                            <label for="address" class="label">
                                <span class="label-text">Address</span>
                            </label>
                            <input id="address" name="address" type="text" placeholder="Type here" value="{{ old('address', $competition->address) }}" class="input input-bordered w-full max-w-xs">

                            <label for="total_races" class="label">
                                <span class="label-text">Total # Races</span>
                            </label>
                            <input id="total_races" name="total_races" type="text" placeholder="Type here" value="{{ old('total_races', $competition->total_races) }}" class="input input-bordered w-full max-w-xs">

                            <label for="logo_url" class="label">
                                <span class="label-text">Logo</span>
                            </label>
                            <input id="logo_url" name="logo_url" type="file" value="{{ old('image', $competition->logo_url) }}" class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <div class="divider"></div>
                            <input type="submit" value="{{__('Save')}}" class="btn btn-sm"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
