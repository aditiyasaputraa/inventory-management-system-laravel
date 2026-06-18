@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-white rounded-2xl border border-gray-200 p-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Role User
        </h1>

        <form action="{{ route('users.update',$user->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium">
                    Nama
                </label>

                <input type="text"
                       value="{{ $user->name }}"
                       disabled
                       class="w-full rounded-xl border-gray-300">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium">
                    Role
                </label>

                <select name="role"
                        class="w-full rounded-xl border-gray-300">

                    <option value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="staff"
                        {{ $user->role == 'staff' ? 'selected' : '' }}>
                        Staff
                    </option>

                    <option value="manager"
                        {{ $user->role == 'manager' ? 'selected' : '' }}>
                        Manager
                    </option>

                </select>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-xl">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection