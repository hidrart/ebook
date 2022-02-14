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
                @if (Auth::user()->role == 'admin')
                <a href="{{ url("/book/edit/$book->id") }}"
                    class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center
                    space-x-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </span>
                    <span>
                        Edit
                    </span>
                </a>
                <form method="POST" action="{{ url("/book/delete/$book->id") }}">
                    @method('delete')
                    @csrf
                    <button
                        class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </span>
                        <span>
                            Delete
                        </span>
                    </button>
                </form>
                @endif
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
                            @if (is_null($book->cart_id) and is_null($book->order_id))
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" />
                            </svg>
                            @endif
                        </div>
                    </div>
                </div>
                <p class="text-slate-500 text-justify mt-4">{!! nl2br(e($book->description)) !!}</p>
                @if (is_null($book->cart_id) and is_null($book->order_id))
                <form method="POST" action="{{ url("/cart/create") }}" class="mt-10">
                    @csrf
                    <input type="book_id" name="book_id" class="hidden" value="{{ $book->id }}">
                    <button
                        class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </span>
                        <span>
                            Rent
                        </span>
                    </button>
                </form>
                @endif
            </article>
        </div>
    </div>
</x-app-layout>