<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                Book Create Page
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
            <div class="p-10 mt-10 bg-white rounded-lg">
                <h2 class="text-lg font-bold">New Book Data</h2>
                <!-- Validation Errors -->
                <form method="POST" action="{{ url('/book/create') }}" class="mt-8 flex flex-col items-start gap-6">
                    @csrf
                    <x-validation-errors class="mb-2" :errors="$errors" />
                    <label class="block w-full">
                        <span class="text-gray-700">Book Title</span>
                        <input type="text" name="title"
                            class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full bg-gray-100 mt-2"
                            value="{{ old('title') }}">
                    </label>
                    <label class="block w-full">
                        <span class="text-gray-700">Book Author</span>
                        <input type="text" name="author"
                            class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full bg-gray-100 mt-2"
                            value="{{ old('author') }}">
                    </label>
                    <label class="block w-full">
                        <span class="text-gray-700">Book Description</span>
                        <textarea name="description"
                            class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full bg-gray-100 mt-2 h-[30vh]">{{ old('description') }}</textarea>
                    </label>
                    <button type="submit"
                        class=" bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                        </span>
                        <span>
                            Create
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>