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
                <a href="{{ url('/') }}"
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
                <a href="{{ url("/profile/edit") }}" class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center
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
            </div>
            @if (session()->has('success'))
            <x-validation-success class="mt-10" :success="session('success')" />
            @endif
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
            @if ($orders->count())
            <table class="mt-10 min-w-full rounded-lg overflow-hidden">
                <thead>
                    <tr class="text-gray-800 bg-gray-200 text-sm text-left font-semibold uppercase tracking-wider">
                        <th class="px-5 py-6"> Name </th>
                        <th class="px-5 py-6"> Role </th>
                        <th class="px-5 py-6"> Created</th>
                        <th class="px-5 py-6"> Quantity </th>
                        <th class="px-5 py-6 text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="border-b border-gray-200 bg-white text-sm text-gray-500">
                        <td class="px-5 py-6 ">
                            <div class="flex items-center space-x-2">
                                <img src="{{ $user->image ? asset('/storage/'.$user->image):asset('img/images.png') }}"
                                    alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div class="flex flex-col">
                                    <div class="flex space-x-1 items-center">
                                        <h3 class="ml-3 font-bold text-gray-800">{{ $user->name }}</h3>
                                        @if ($user->role == 'admin')
                                        <div class="pt-0.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-700"
                                                viewBox="0 0 20 20" fill="currentColor">
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
                        </td>
                        <td class="px-5 py-6">
                            <p>{{ $user->role }}</p>
                        </td>
                        <td class="px-5 py-6">
                            <p>
                                {{ \Carbon\Carbon::parse($order->order_date)->diffForHumans() }}
                            </p>
                        </td>
                        <td class="px-5 py-6 pl-14">
                            <p>
                                {{ $order->book->count() }}
                            </p>
                        </td>
                        <td class="px-5 py-6 flex space-x-2 justify-center w-full">
                            <a href="{{ url("/order/$order->id") }}" class="rounded-full bg-indigo-100
                                text-indigo-700 px-4 py-2">
                                Open
                            </a>
                            <form method="POST" action="{{ url("/order/delete/$order->id") }}">
                                @method('delete')
                                @csrf
                                <button class="rounded-full bg-indigo-100
                                    text-indigo-700 px-4 py-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 w-full mt-10">
                @foreach ($orders as $order)
                @foreach ($order->book as $book)
                <a href="{{ url("/book/$book->id") }}" class="w-full bg-white p-10 rounded-lg">
                    <div tabindex="0" aria-label="card {{ $book->id }}">
                        <div class="flex items-center border-b border-slate-100 pb-6">
                            <div class="flex justify-between w-full">
                                <div class="w-9/10 flex flex-col">
                                    <h1 class="font-bold text-slate-900">{{ $book->title }}</h1>
                                    <h3 class="text-sm text-indigo-700">{{ $book->author }}</h3>
                                </div>
                                <div role="img" aria-label="bookmark" class="w-1/10 text-indigo-700">
                                    @if ($book->order_id == null)
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
                @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>