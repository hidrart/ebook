<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                Cart Page
            </div>
            @if ($carts->first())
            <div class="mt-10 flex justify-end space-x-4">
                <a href="{{ url('/book') }}"
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
                <form method="POST" action="{{ url("/order/create") }}">
                    @csrf
                    <button
                        class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>
                            Order
                        </span>
                    </button>
                </form>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 w-full mt-10">
                @foreach ($carts as $cart)
                <a href="{{ url("/cart/$cart->id") }}" class="w-full bg-white p-10 rounded-lg">
                    @foreach ($cart->book as $book)
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
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
                    @endforeach
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>