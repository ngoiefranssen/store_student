@extends('layouts.main')
@section('content')


<div class="h-screen bg-white relative flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white md:shadow-lg shadow-none rounded p-6 w-96" >
        <h1 class="text-3xl text-center font-bold leading-normal" >Update student</h1>
        <p class="text-sm leading-normal">Make sure to fill in the fields in front of you for the modification</p>

        <form class="space-y-5 mt-5"  action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="ancien_image" value="{{ $student->image_url }}" style="width:50px; ">

            <div class="mb-4 relative">
                <input id="name_student" value="{{ $student->name_student }}"  name="name_student" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
                <label for="name_student" class="label absolute mb-0 pt-4 pl-3 leading-tighter text-gray-500 text-base mt-2 cursor-text"></label>
                @error('name_student')
                    <div class="">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 relative">
                <input id="fisrt_name"  name="fisrt_name" value="{{ $student->fisrt_name }}" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
                <label for="fisrt_name" class="label absolute mb-0 pt-4 pl-3 leading-tighter text-gray-500 text-base mt-2 cursor-text"></label>
                @error('fisrt_name')
                    <div class="">{{ $message }}</div>
                @enderror
            </div>
            <!--- Kind-->

            <div class="mb-4 relative">
                <input id="kind"  name="kind" value="{{ $student->kind }}" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
                <label for="kind" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-500 text-base  cursor-text"></label>
                @error('kind')
                    <div class="">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 relative">
                <input id="registration_number" value="{{ $student->registration_number }}"  name="registration_number" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
                <label for="registration_number" class="label absolute mb-0 pt-4 pl-3 leading-tighter text-gray-500 text-base mt-2 cursor-text"></label>
                @error('registration_number')
                    <div class="">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 relative">
                <img src="{{ asset($student->image_url) }}" alt="" style="width: 250px; height: 250px;">
                <input type="file" id="image_url" name="image_url" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
                <label for="image_url" class="label absolute mb-0  pt-4 pl-3 leading-tighter text-gray-500 text-base mt-2 cursor-text"></label>
                @error('image_url')
                    <div class="">{{ @message }}</div>
                @enderror
            </div>


            <button class="w-full text-center bg-blue-700 hover:bg-blue-900 rounded-full text-white py-3 font-medium" type="submit">Update</button>
        </form>
    </div>


</div>

@endsection
