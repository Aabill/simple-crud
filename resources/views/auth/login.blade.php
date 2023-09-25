<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div x-data class="relative group" x-ref="loginEmail">
            <x-input-label class="absolute top-2 left-2 cursor-text group-[.is-focused]:-top-2 group-[.is-focused]:left-4  group-[.is-focused]:rounded-md group-[.is-focused]:px-1 group-[.is-focused]:pb-[0.5px] group-[.is-focused]:text-[11px] group-[.is-focused]:bg-gray-800  transition-all ease-linear duration-100" for="email" :value="__('Email')" />
            <x-text-input id="email" 
							x-init="$nextTick(() => { if($el.tagName == 'INPUT') $refs.loginEmail.classList.add('is-focused') });"
							x-on:focus="$refs.loginEmail.classList.add('is-focused');" 
							x-on:blur="
							if ($event.target.value) return;
							$refs.loginEmail.classList.remove('is-focused')"
							class="block mt-1 w-full " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div x-data class="mt-4 relative group" x-ref="loginPassword">
            <x-input-label for="password" :value="__('Password')" 
						class="absolute top-2 left-2 cursor-text group-[.is-focused]:-top-2 group-[.is-focused]:left-4  group-[.is-focused]:rounded-md group-[.is-focused]:px-1 group-[.is-focused]:pb-[0.5px] group-[.is-focused]:text-[11px] group-[.is-focused]:bg-gray-900  transition-all ease-linear duration-100"/>

            <x-text-input id="password" class="block mt-1 w-full"
						x-on:focus="
						$refs.loginPassword.classList.add('is-focused');" 
						x-on:blur="
						if ($event.target.value) return;
						$refs.loginPassword.classList.remove('is-focused');"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

				{{-- <hr class=" border-gray-600 darl:border-gray-400 mt-4"> --}}
				<div class="mt-4 text-gray-600 dark:text-gray-300 text-sm flex justify-between items-center whitespace-nowrap 
					before:content-[''] before:h-[0.5px] before:w-full before:inline-flex before:bg-gray-400 before:mx-2 
					after:content-[''] after:h-[0.5px] after:w-full after:inline-flex after:bg-gray-400 after:mx-2">Don't have an account?</div>
				<div class="flex items-center justify-center mt-4">
					@if (Route::has('register'))
              <a class="text-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                 <strong>{{ __('Sign Up') }}</strong> 
              </a>
          @endif
				</div>
    </form>
</x-guest-layout>
