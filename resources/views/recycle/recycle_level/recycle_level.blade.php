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
                        @if($levelRecycles->count())

                        @foreach($levelRecycles as $levelRecycle)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $levelRecycle->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $levelRecycle->name_level }}</div>
                            </td>
                            <td class="px-6 py-4">

                                <a href="{{ url('presentRestoreLevel/restoreLevel/' .$levelRecycle->id) }}"><i class="fas fa-window-restore"></i></a>
                                <a href="{{ url('presentDeletelevelFinal/deleteFinalLevel/' .$levelRecycle->id) }}" class=""><i class="fas fa-trash"></i></a>
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

@endsection
