<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6 flex items-center justify-between">
                Book Index Page
            </div>
            <form action="/book" class="mt-10 flex items-center space-x-4 rounded-lg">
                <input name="search"
                    class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    type="text" placeholder="search" />
                <button type="submit""
                    class=" bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center
                    space-x-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <span>
                        Search
                    </span>
                </button>
                @if (Auth::user()->role == 'admin')
                <a href="{{ url('/book/create') }}"
                    class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <span>
                        Add
                    </span>
                </a>
                @endif
            </form>
            @if (session()->has('success'))
            <x-validation-success class="mt-10" :success="session('success')" />
            @endif
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 w-full mt-10">
                @foreach ($books as $book)
                <a href="{{ url("/book/$book->id") }}" class="w-full bg-white p-10 rounded-lg">
                    <div tabindex="0" aria-label="card {{ $book->id }}">
                        <div class="flex items-center border-b border-slate-100 pb-6">
                            <img src="{{ url("https://i.pravatar.cc/150?img={!! $book->id !!}") }}"
                            alt="avatar"
                            class="w-10 h-10 rounded-full object-cover" />
                            <div class="flex justify-between w-full pl-4">
                                <div class="w-9/10 flex flex-col">
                                    <h1 class="font-bold text-slate-900">{{ $book->title }}</h1>
                                    <h3 class="text-sm text-indigo-700">{{ $book->author }}</h3>
                                </div>
                                <div role="img" aria-label="bookmark" class="w-1/10 text-indigo-700">
                                    @if (is_null($book->cart_id) and is_null($book->order_id))
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                    @endif
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
                @endforeach
            </div>
            <div class="mt-4">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-app-layout>