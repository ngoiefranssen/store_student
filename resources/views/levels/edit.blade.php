@extends('layouts.main')
@section('content')

<div class="h-screen bg-white relative flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white md:shadow-lg shadow-none rounded p-6 w-96" >
        <h1 class="text-3xl text-center font-bold leading-normal" >Update Level</h1>
        <p class="text-sm leading-normal">Make sure to fill in the fields in front of you for the modification</p>
        <form class="space-y-5 mt-5" action="{{ route('levels.update', $level->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 relative">
                <input id="name_level" value="{{ $level->name_level }}" placeholder="Name" name="name_level" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>

                @error('name_level')
                    <div class="">{{ $message }}</div>
                @enderror
            </div>

            <button class="w-full text-center bg-blue-700 hover:bg-blue-900 rounded-full text-white py-3 font-medium" type="submit">Update</button>
        </form>
    </div>


</div>

@endsection
