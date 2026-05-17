@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md bg-surface-container-lowest rounded-xl shadow-[0_1px_3px_rgba(0,0,0,0.1)] border border-outline-variant p-8">

    <div class="flex flex-col items-center mb-8">
        <img alt="Web Logo" class="h-20 w-20 mb-4 object-contain" src="{{ asset('images/logo.png') }}" />
        <h1 class="font-headline-md text-headline-md text-on-surface mb-2">Manajemen Pegawai</h1>
        <p class="font-body-md text-body-md text-on-surface-variant text-center">Masukkan kredensial Anda untuk mengakses sistem.</p>
    </div>

    @if(session('error'))
    <div class="bg-error-container text-on-error-container p-3 rounded-lg mb-4 text-sm border border-error" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        {{ session('error') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6" autocomplete="off">
        @csrf

        <div class="space-y-1">
            <label class="block font-label-md text-label-md text-on-surface mb-1" for="email">Email</label>
            <input class="w-full h-10 px-3 bg-surface-container-lowest border rounded-lg font-body-md text-body-md text-on-surface placeholder:text-shadow-on-secondary-container focus:outline-none focus:ring-2 focus:ring-offset-2 hover:bg-surface-container-low transition-colors
                @if($errors->has('email'))
                    border-error focus:border-error focus:ring-error
                @else
                    border-outline-variant focus:border-primary focus:ring-primary
                @endif
            "
                id="email" name="email" value="{{ old('email') }}" placeholder="admin@company.com" type="email" autofocus />
            @error('email')
            <small class="text-error text-sm">{{ $message }}</small>
            @enderror
        </div>

        <div class="space-y-1" x-data="{ show: false }">
            <label class="block font-label-md text-label-md text-on-surface mb-1" for="password">Password</label>
            <div class="relative">
                <input class="w-full h-10 pl-3 pr-10 bg-surface-container-lowest border rounded-lg font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-offset-2 hover:bg-surface-container-low transition-colors
                @if($errors->has('password'))
                    border-error focus:border-error focus:ring-error
                @else
                    border-outline-variant focus:border-primary focus:ring-primary
                @endif
                "
                    id="password" name="password" placeholder="******" :type="show ? 'text' : 'password'" />

                <button @click="show = !show" class="cursor-pointer absolute inset-y-0 right-0 pr-3 flex items-center text-on-surface-variant hover:text-on-surface focus:outline-none" type="button">
                    <span class="material-symbols-outlined text-[20px]" x-text="show ? 'visibility_off' : 'visibility'"></span>
                </button>
            </div>
            @error('password')
            <small class="text-error text-sm">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary bg-surface-container-lowest"
                    id="remember-me" name="remember" type="checkbox" />
                <label class="ml-2 block font-body-md text-body-md text-on-surface-variant" for="remember-me">
                    Ingat saya
                </label>
            </div>
        </div>

        <div>
            <button class="w-full h-10 flex justify-center items-center bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-opacity" type="submit">
                Masuk
            </button>
        </div>
    </form>
</div>
@endsection