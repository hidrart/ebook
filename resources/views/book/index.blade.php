<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                Book Index Page
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 w-full mt-10">
                @foreach ($books as $book)
                <a href="{{ url("/book/$book->id") }}" class="w-full bg-white p-10 rounded-lg">
                    <div tabindex="0" aria-label="card {{ $book->id }}">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <p tabindex="0" class="text-sm leading-6 text-slate-500 py-4 text-justify">
                                {{ Str::words($book->description,25) }}</p>
                            <div tabindex="0" class="flex space-x-3">
                                <div class="py-2 px-4 text-xs text-indigo-700 rounded-full bg-indigo-100">
                                    #book</div>
                                <div class="py-2 px-4 ml-3 text-xs text-indigo-700 rounded-full bg-indigo-100">
                                    #reading</div>
                            </div>
                        </div>
                    </div>
                </a>
                {{-- <article class="px-10 py-5">
                    <h1 class="text-slate-900 font-semibold text-xl">{{ $book->title }}</h1>
                    <h3 class="text-indigo-700">{{ $book->author }}</h3>
                    <p class="text-slate-500 mt-3 text-justify">{{ $book->description }}</p>
                </article> --}}
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>