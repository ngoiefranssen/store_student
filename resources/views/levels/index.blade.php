@extends('layouts.main')
@section('content')

<div class="my-10 ml-10">
    <a href="{{ route('levels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Level</a>
</div>

<div class="container flex justify-center mx-auto my-5">
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

                        @if($levels->count())

                        @foreach($levels as $leve)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $leve->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $leve->name_level }}</div>
                            </td>

                            <td class="px-6 py-4">

                                <a href=""><i class="far fa-eye"></i></a>
                                <a href="{{ route('levels.edit', $leve->id) }}" class=""><i class="far fa-edit"></i></a>
                                <a href="{{ route('deleteLevel.recycle', $leve->id) }}"><i class=" fas fa-trash-alt"></i></a>
                                {{-- <form action="" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('level.destroy') }}" type="hidden" name="id"><i class=" fas fa-trash-alt"></i></a>
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

    {{ $levels->links() }}

@endsection
