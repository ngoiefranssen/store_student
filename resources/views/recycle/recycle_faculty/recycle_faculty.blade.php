@extends('layouts.main')
@section('content')

<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">#</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Name</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @if($facultyRestoreDeletes->count())

                        @foreach($facultyRestoreDeletes as $facultyRestoreDelete)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $facultyRestoreDelete->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $facultyRestoreDelete->faculty_name }}</div>
                            </td>

                            <td class="px-6 py-4">

                                <a href="{{ url('presentRestore/restoreFaculty/' .$facultyRestoreDelete->id)}}" class=""><i class="fas fa-window-restore"></i></a>

                                <a href="{{ url('presentDeleleFinal/finalDeleteFacullty/' .$facultyRestoreDelete->id) }}"><i class="far fa-trash-alt"></i></a>

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
