<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                Book Detail Page
            </div>

            <article class="p-10 mt-10 bg-white rounded-lg">
                <div class="flex items-center border-b border-slate-100 pb-6">
                    <img src="{{ url("https://i.pravatar.cc/150?img={!! $book->id !!}") }}"
                    alt="avatar"
                    class="w-12 h-12 rounded-full" />
                    <div class="flex justify-between w-full pl-4">
                        <div class="w-9/10 flex flex-col">
                            <h1 class="text-lg font-bold text-slate-900">{{ $book->title }}</h1>
                            <h3 class="text-sm text-indigo-700">{{ $book->author }}</h3>
                        </div>
                        <div role="img" aria-label="bookmark" class="w-1/10 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="text-slate-500 text-justify mt-4">{{ $book->description }}</p>
            </article>
        </div>
    </div>
</x-app-layout>