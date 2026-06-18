@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Pengguna</h1>
        <p class="text-sm text-gray-500">
            Kelola pengguna dan role sistem.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-200 p-5 overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left text-gray-500">
                    <th class="py-3">Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="py-3 font-medium">
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        <span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>

                    <td>
                        {{ $user->created_at->format('d M Y') }}
                    </td>

                    <td class="text-right">
                        <a href="{{ route('users.edit',$user->id) }}"
                           class="text-blue-600 font-medium mr-3">
                            Edit Role
                        </a>

                        <form action="{{ route('users.destroy',$user->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Hapus user ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 font-medium">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection