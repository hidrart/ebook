<x-guest-layout>
    <x-auth-card-register>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-2 gap-x-6 gap-y-4">
                <!-- First Name -->
                <div>
                    <x-label for="firstname" :value="__('First Name')" />
                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname"
                        :value="old('firstname')" required autofocus />
                </div>

                <!-- Middle Name -->
                <div>
                    <x-label for="middlename" :value="__('Middle Name')" />
                    <x-input id="middlename" class="block mt-1 w-full" type="text" name="middlename"
                        :value="old('middlename')" autofocus />
                </div>

                <!-- Last Name -->
                <div>
                    <x-label for="lastname" :value="__('Last Name')" />
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                        :value="old('lastname')" required autofocus />
                </div>

                <!-- Username -->
                <div>
                    <x-label for="username" :value="__('Username')" />
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required autofocus />
                </div>

                <!-- Gender -->
                <div>
                    <x-label for="gender" :value="__('Gender')" />
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-slate-900 focus:ring-0" name="gender"
                                value="male" @if ( old('gender')=='male' ) checked @endif>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-2">
                            <input type="radio" class="form-radio text-slate-900 focus:ring-0" name="gender"
                                value="female" @if ( old('gender')=='female' ) checked @endif>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>

                <!-- Role -->
                <div>
                    <x-label for="role" :value="__('Account Role')" />
                    <select name="role" id="role"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div>
                    <x-label for="image" :value="__('Choose Photo')" />
                    <x-input type="file" name="image"
                        class="w-full block mt-1 border-gray-300 border file:mr-4 file:py-2.5 file:px-4 file:rounded-l-md file:border-0 file:bg-gray-900 file:text-white file:font-sans file:cursor-pointer" />
                </div>
            </div>

            <div class="flex items-center justify-between mt-8">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card-register>
</x-guest-layout>