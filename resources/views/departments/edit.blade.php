@extends('layouts.main')
@section('content')

<div class="h-screen bg-white relative flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white md:shadow-lg shadow-none rounded p-6 w-96" >
        <h1 class="text-3xl text-center font-bold leading-normal" >Create Departmenets</h1>
        <p class="text-sm leading-normal">Be sure to complete the fields in front of you for registration</p>
        <div>
            @if ($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{  $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <form class="space-y-5 mt-5"  action="{{ route('departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-4 relative">
                <input id="name" placeholder="Name" value="{{ $department->name }}" name="name" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>

                @error('name')
                    <p class="">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 relative">
                <select class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" name="faculty_id" id="faculty_id">
                    @foreach($faculties as $faculte)
                        <option value="{{ $faculte->id }}" {{ $department->faculty_id == $faculte->id ? 'select' : '' }}>{{ $faculte->faculty_name }}</option>
                    @endforeach
                </select>
                @error('faculty_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 relative">

                <select class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" name="level_id" id="level_id">
                    @foreach($levels as $leve)
                        <option value="{{ $leve->id }}" {{ $department->level_id == $leve->id ? 'select' : '' }}>{{ $leve->name_level }}</option>
                    @endforeach
                </select>

                @error('level_id')
                    <p class="">{{ $message }}</p>
                @enderror
            </div>
            <button class="w-full text-center bg-blue-700 hover:bg-blue-900 rounded-full text-white py-3 font-medium" type="submit">Register</button>
        </form>
    </div>
</div>

@endsection
