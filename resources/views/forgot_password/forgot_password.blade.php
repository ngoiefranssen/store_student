@extends('layouts.main')
@section('content')

<div class="h-screen bg-white relative flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white md:shadow-lg shadow-none rounded p-6 w-96" >

        @if(session('message'))

            <div class="text-red-200">{{ session('message') }}</div>

        @endif
        <h1 class="text-3xl text-center font-bold leading-normal" >Forgot password</h1>
        <p class="text-sm leading-normal"></p>
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
        <form class="space-y-5 mt-5"  action="{{ route('forgot.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-4 relative">
                <input id="password" name="actual_password" placeholder="Actuel password" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" type="text" autofocus>
            </div>

            <div class="mb-4 relative">
                <input id="password" type="password" placeholder="new password" name="password" class="w-full rounded px-3 border border-gray-500 pt-5 pb-2 focus:outline-none input active:outline-none" autofocus>
            </div>


             <div class="relative flex items-center border border-gray-500 focus:ring focus:border-blue-500 rounded">
                <input id="password" placeholder="confirm password" name="password_confirmation" class="w-full rounded px-3 pt-5 outline-none pb-2 focus:outline-none active:outline-none input active:border-blue-500" type="password"/>
                <a class="text-sm font-bold text-blue-700 hover:bg-blue-100 rounded-full px-2 py-1 mr-1 leading-normal cursor-pointer">show</a>
            </div>
            <button class="w-full text-center bg-blue-700 hover:bg-blue-900 rounded-full text-white py-3 font-medium" type="submit">confirmed</button>
        </form>
    </div>
</div>


@endsection
