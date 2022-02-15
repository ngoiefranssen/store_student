@extends('layouts.main')
@section('content')

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

                        @if($resotres_deletes->count())

                        @foreach($resotres_deletes as $resotre_delete)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $resotre_delete->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $resotre_delete->name }}</div>
                            </td>
                            <td class="py-6 px-4">
                                <div class="text-sm text-gray-900">{{ $resotre_delete->faculty->faculty_name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $resotre_delete->level->name_level }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <a href="" class=""><i class="far fa-eye"></i></a>
                                <a href="{{ url('restore_daprtment/departmentRestore/' .$resotre_delete->id) }}"><i class="fas fa-window-restore"></i></a>
                                <a href="{{ url('finalDeleteDepart/finaleDeleteDepart/' .$resotre_delete->id) }}"><i class=" fas fa-trash-alt"></i></a>
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
