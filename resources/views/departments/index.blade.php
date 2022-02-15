@extends('layouts.main')
@section('content')


<div class="my-12 ml-6">
    <a href="{{ route('departments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ml-5">Add Department</a>
</div>
<div class="container flex mx-auto ml-12">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">#</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Departments_Name_</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Name_Faculty</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Name_Level</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">

                        @if($departments->count())

                        @foreach($departments as $department)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $department->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $department->name }}</div>
                            </td>
                            <td class="py-6 px-4">
                                <div class="text-sm text-gray-900">{{ $department->faculty->faculty_name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $department->level->name_level }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <a href="" class=""><i class="far fa-eye"></i></a>
                                <a href="{{ route('departments.edit', $department->id) }}"><i class="far fa-edit"></i></a>
                                <a href="{{ route('recycle.department', $department->id) }}"><i class=" fas fa-trash-alt"></i></a>
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
