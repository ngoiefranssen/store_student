@extends('layouts.main')
@section('content')

<div class="h-screen bg-white relative flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white md:shadow-lg shadow-none rounded p-6 w-96" >
        <h1 class="text-3xl text-center font-bold leading-normal" >Create student</h1>
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
        <form class="space-y-5 mt-5"  action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-4 relative">
                <input id="name_student" placeholder="Name"  name="name_student" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-noone" type="text" autofocus>
            </div>

            <div class="mb-4 relative">
                <input id="fisrt_name" placeholder="Fisrt name" name="fisrt_name" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
            </div>

            <div class="mb-4 relative">
                <input id="kind"  name="kind" placeholder="Kind" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
            </div>

            <div class="mb-4 relative">
                <input id="registration_number" placeholder="registration number"  name="registration_number" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
            </div>
            <div class="mb-4 relative">
                <input type="file" id="image_url"  placeholder="image" name="image_url" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
            </div>

            {{-- <div class="relative flex items-center border border-gray-500 focus:ring focus:border-blue-500 rounded">
                <input id="password" class="w-full rounded px-3 pt-5 outline-none pb-2 focus:outline-none active:outline-none input active:border-blue-500" type="password"/>
                <label for="password" class="label absolute mb-0  pt-4 pl-3 leading-tighter text-gray-500 text-base mt-2 cursor-text">Password</label>
                <a class="text-sm font-bold text-blue-700 hover:bg-blue-100 rounded-full px-2 py-1 mr-1 leading-normal cursor-pointer">show</a>
            </div> --}}
            {{-- <div class="-m-2">
                <a class="font-bold text-blue-700 hover:bg-blue-200 hover:underline hover:p-5 p-2 rounded-full" href="#">Forgot password?</a>
            </div> --}}
            <button class="w-full text-center bg-blue-700 hover:bg-blue-900 rounded-full text-white py-3 font-medium" type="submit">Register</button>
        </form>
    </div>

    {{-- <p>New to LinkedIn?<a class="text-blue-700 font-bold hover:bg-blue-200 hover:underline hover:p-5 p-2 rounded-full" href="#">Join now</a></p> --}}
</div>

@endsection
