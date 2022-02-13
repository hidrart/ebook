<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                User Detail Page
            </div>
            <div class="mt-10 flex justify-end space-x-4">
                <a href="{{ url()->previous() }}"
                    class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </span>
                    <span>
                        Back
                    </span>
                </a>

            </div>
            <div class="flex items-center border-b border-slate-100 p-6 mt-10 bg-white rounded-lg space-x-2">
                <div class="w-10 h-10">
                    <img src="{{ $user->image ? asset('/storage/'.$user->image) : asset('img/images.png') }}"
                        alt="avatar" class="w-full h-full rounded-full object-cover" />
                </div>
                <div class="flex flex-col">
                    <div class="flex space-x-1 items-center">
                        <h3 class="ml-3 font-bold text-gray-800">{{ $user->name }}</h3>
                        @if ($user->role == 'admin')
                        <div class="pt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-700" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        @endif
                    </div>
                    <p class=" ml-3 text-sm">{{ $user->email }}</p>
                </div>
            </div>
            <div class="p-10 mt-10 bg-white rounded-lg">
                <h2 class="text-lg font-bold">Edit User Data</h2>
                <form method="POST" action="{{ url("/profile/edit") }}" class="mt-8 flex flex-col items-start
                    gap-6" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-validation-errors class="mb-2" :errors="$errors" />
                    <label class="block w-full">
                        <span class="text-gray-700">Username</span>
                        <input type="text" name="name"
                            class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full bg-gray-100 mt-2"
                            value="{{ old('name', $user->name) }}">
                    </label>
                    <label class="block w-full">
                        <span class="text-gray-700">User email</span>
                        <input type="email" name="email"
                            class="rounded-md border-0 w-full bg-gray-100 text-gray-400 mt-2"
                            value="{{ old('email', $user->email) }}" disabled>
                    </label>
                    <label class="block w-full">
                        <span class="text-gray-700">Choose profile photo</span>
                        <input type="file" name="image"
                            class="w-full text-slate-500 bg-gray-100 rounded-md file:mr-4  file:py-2.5 file:px-4 file:rounded-l-md file:border-0 file:bg-indigo-200 file:text-indigo-700 file:font-sans mt-2 file:cursor-pointer" />
                    </label>
                    <label class="block w-full">
                        <span class="text-gray-700">User Role</span>
                        <select name="role" id="role"
                            class="w-full bg-gray-100 rounded-md mt-2 border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled>Role</option>
                            <option value="user" @if (old('role', $user->role) == 'user') selected @endif>User</option>
                            <option value="admin" @if (old('role', $user->role) == 'admin') selected @endif>Admin
                            </option>
                        </select>
                    </label>
                    <input type="hidden" class="hidden" value="{{ $user->image }}" name="before">
                    <div class="flex justify-end w-full">
                        <button type="submit"
                            class=" bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2 mt-4">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                            </span>
                            <span>
                                Save
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>