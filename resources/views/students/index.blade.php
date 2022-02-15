@extends('layouts.main')
@section('content')


{{-- <div class="flex flex-1 md:w-1/3 justify-rigth md:justify-start text-white px-2 my-6">
    <span class="relative w-full">
        <input type="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
        <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
            <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
        </div>
    </span>
</div> --}}

<div class="my-8 ml-10">
    <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">Add Student</a>
</div>

<div class="container flex ml-14 mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">#</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Name</th>
                            <th class="px-6 py-2 text-xs text-gray-500">First Name</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Kind</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Registration Number</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Image</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if($students->count())

                        @foreach($students as $student)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $student->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $student->name_student }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $student->fisrt_name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="text-sm text-gray-500" >{{ $student->kind}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="text-sm text-gray-500">{{ $student->registration_number}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <img src="{{ asset($student->image_url) }}" alt="" style="width:50px; height: 50px">
                            </td>
                            <td class="px-6 py-4">

                                <a href="" class=""><i class="far fa-eye"></i></a>
                                <a href="{{ route('students.edit', $student->id) }}" class=""><i class="far fa-edit"></i></a>
                                <a href="{{ route('student.recycle',$student->id)}}"><i class=" fas fa-trash-alt"></i></a>

                                {{-- <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="">
                                    <button class=""><i class=" fas fa-trash-alt"></i></button>
                                </form> --}}
                            </td>

                        </tr>

                        @endforeach
                        @else
                            <p class="text-blue-600 text-center">Aucune donne pour l'instant</p>
                        @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="my-6 ml-3 ">{{ $students->links() }}</div>
@endsection
