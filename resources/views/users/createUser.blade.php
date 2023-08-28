<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-3xl mx-auto my-4 bg-white rounded overflow-hidden shadow-lg">

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ url('/users') }}" class="mx-4 px-4 py-4 my-4">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-3">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="mt-3">

                        <x-jet-label for="userType" value="{{ __('Tipo De Usuario') }}" />
                        <select id="userType" class="block mt-1 w-full border-inherit rounded" name="userType">

                            <option value="1">
                                Admin
                            </option>
                            <option value="2">
                                Gerencia
                            </option>
                            <option value="3">
                                Costos
                            </option>
                            <option value="4">
                                Consultor
                            </option>
                            <option value="0">
                                Usuario
                            </option>

                    </div>

                    </select>

                    <!-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                    @endif -->

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Ya estas registrado?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Registrar') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>






</x-app-layout>