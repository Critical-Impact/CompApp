<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $club->id ? __('Club - Edit') : __('Club - Add') }}
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
                        <form method="POST" enctype="multipart/form-data" action="{{ $club->id ? route('club.update',$club->id) : route('club.store') }}">
                            @csrf
                            @isset($club->id)
                                @method('PATCH')
                            @endisset
                            <label for="name" class="label">
                                <span class="label-text">Name</span>
                            </label>
                            <input id="name" name="name" type="text" placeholder="Type here" value="{{ old('name', $club->name) }}" class="input input-bordered w-full max-w-xs">
                            <label for="color_one" class="label">
                                <span class="label-text">Colour #1</span>
                            </label>
                            <div x-data="{ color_one: '{{ old('color_one', $club->color_one) }}' }">
                                <div class="flex w-full">
                                    <input id="color_one" name="color_one" type="text" x-model="color_one" placeholder="Enter a colour hex"  value="{{ old('color_one', $club->color_one) }}" class="input input-bordered w-full max-w-xs">
                                    <div class="divider lg:divider-vertical"> </div>
                                    <span class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"  :style="`background: ${color_one}; color: white; width:45px; height:45px;`"></span>
                                </div>
                            </div>

                            <label for="color_two" class="label">
                                <span class="label-text">Colour #2</span>
                            </label>

                            <div x-data="{ color_two: '{{ old('color_two', $club->color_two) }}' }">
                                <div class="flex w-full">
                                    <input id="color_two" name="color_two" type="text" x-model="color_two" placeholder="Enter a colour hex"  value="{{ old('color_two', $club->color_two) }}" class="input input-bordered w-full max-w-xs">
                                    <div class="divider lg:divider-vertical"> </div>
                                    <span class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"  :style="`background: ${color_two}; color: white; width:45px; height:45px;`"></span>
                                </div>
                            </div>

                            <label for="image" class="label">
                                <span class="label-text">Image</span>
                            </label>
                            <input id="image" name="image" type="file" value="{{ old('image', $club->image) }}" class="form-control
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
