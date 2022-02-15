@extends('layouts.main')
@section('content')

<div class="container flex justify-center mx-auto my-12">
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

                        @if($studentsdeletes->count())

                        @foreach($studentsdeletes as $studentdelete)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $studentdelete->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $studentdelete->name_student }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{ $studentdelete->first_name }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="text-sm text-gray-500" >{{ $studentdelete->kind}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="text-sm text-gray-500">{{ $studentdelete->registration_numer}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <img src="{{ asset($studentdelete->image_url) }}" alt="" style="height: 50px; width:50px;">
                            </td>
                            <td class="px-6 py-4">

                                <a href="{{ url('presentRestoreStudent/restorationStudent/' .$studentdelete->id) }}" class=""><i class="fas fa-window-restore"></i></a>

                                <a href="{{ url('presentFinaleDeleteStudents/finaleDelete/' .$studentdelete->id) }}"><i class="fas fa-trash-alt"></i></a>

                                {{-- <form action="" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"></button>
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

@endsection
