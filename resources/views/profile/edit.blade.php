@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">Pengaturan Akun</h1>
        <p class="text-sm text-gray-500">Kelola informasi profil dan keamanan akun kamu.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>

            <span class="inline-block mt-4 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                {{ ucfirst(Auth::user()->role) }}
            </span>
        </div>

        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>

</div>
@endsection