@extends('layouts.main')
@section('content')

<div class="my-12 ml-6">
    <a href="{{ route('faculty.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 ml-5">Add Faculty</a>
</div>

<div class="container flex mx-auto ml-12">
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

                        @if($facultes->count())

                        @foreach($facultes as $faculte)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $faculte->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $faculte->faculty_name }}</div>
                            </td>

                            <td class="px-6 py-4">

                                <a href="" class=""><i class="far fa-eye"></i></a>
                                <a href="{{ route('faculty.edit', $faculte->id) }}"><i class="far fa-edit"></i></a>
                                <a href="{{ route('faculte.recycle', $faculte->id) }}"><i class=" fas fa-trash-alt"></i></a>
                                {{-- <form action="" method="POST" class="px-6 py-4">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('faculty.destroy', $faculte->id) }}" type="hidden" name="id"><i class=" fas fa-trash-alt"></i></a>
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
