@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<form method="POST" action="/login" class="max-w-sm mx-auto mt-12 space-y-4 p-8 bg-white rounded-2xl shadow-lg border-t-4 border-emerald-600">
    @csrf
    <div class="text-center mb-2">
        <h1 class="text-2xl font-bold text-emerald-700">Nurse Sign in</h1>
        <p class="text-sm text-slate-500">Barangay vaccination records</p>
    </div>

    <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email"
               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="Password"
               class="w-full border border-slate-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg p-2 transition">Sign in</button>
</form>
@endsection
