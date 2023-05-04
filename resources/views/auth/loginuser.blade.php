<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-center text-white text-3xl my-5 px-4 font-serif">Acceso Productores</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="my-6  px-6">
                <x-jet-label for="user" value="{{ __('user') }}" class="text-white text-center text-lg my-2" />
                <x-jet-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" required autofocus />
            </div>

            <div class="mt-4 my-6  px-6">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-white text-center text-lg my-2" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            {{--
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center text-white">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>
            --}}
            <div class="flex justify-center">
                <x-jet-button class="text-white">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
            
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                  <a class="underline text-sm text-white hover:text-gray-400  mr-auto" href="{{ route('registro.usuarios') }}">
                    {{ __('Registrarme') }}
                    </a>
                    <a class="underline text-sm text-white hover:text-gray-400" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu clave?') }}
                    </a>
                @endif

                
            </div>
           
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
