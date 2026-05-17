@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md bg-surface-container-lowest rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.1)] border border-outline-variant p-8">
    <!-- Header -->
    <div class="flex flex-col items-center mb-8">
        <img alt="Web Logo" class="h-20 w-20 mb-4 object-contain" src="{{ asset('images/logo.png') }}"/>
        <h1 class="font-headline-md text-headline-md text-on-surface mb-2">Manajemen Pegawai</h1>
        <p class="font-body-md text-body-md text-on-surface-variant text-center">Masukkan kredensial Anda untuk mengakses sistem.</p>
    </div>

    @if($errors->any())
        <div class="bg-error-container text-on-error-container p-3 rounded-lg mb-4 text-sm border border-error">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        
        <!-- Email Input -->
        <div class="space-y-2">
            <label class="block font-label-md text-label-md text-on-surface" for="email">Email</label>
            <input class="w-full h-10 px-3 bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2 hover:bg-surface-container-low transition-colors" 
                   id="email" name="email" value="{{ old('email') }}" placeholder="admin@company.com" type="email" required autofocus/>
        </div>

        <!-- Password Input -->
        <div class="space-y-2">
            <label class="block font-label-md text-label-md text-on-surface" for="password">Password</label>
            <div class="relative">
                <input class="w-full h-10 pl-3 pr-10 bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-2 hover:bg-surface-container-low transition-colors" 
                       id="password" name="password" placeholder="******" type="password" required/>
                <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-on-surface-variant hover:text-on-surface focus:outline-none" type="button">
                    <span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span>
                </button>
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary bg-surface-container-lowest" 
                       id="remember-me" name="remember" type="checkbox"/>
                <label class="ml-2 block font-body-md text-body-md text-on-surface-variant" for="remember-me">
                    Ingat saya
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button class="w-full h-10 flex justify-center items-center bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-opacity" type="submit">
                Masuk
            </button>
        </div>
    </form>
</div>
@endsection
