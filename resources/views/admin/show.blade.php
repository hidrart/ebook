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

            <div class="flex items-center border-b border-slate-100 p-6 mt-10 bg-white rounded-lg">
                <img src="{{
                    url("https://i.pravatar.cc/150?u={!! $user->email !!}")
                }}"
                alt="avatar"
                class="w-12 h-12 rounded-full" />
                <div class="flex justify-between w-full pl-4">
                    <div class="w-9/10 flex flex-col">
                        <h1 class="text-lg font-bold text-slate-900">{{ $user->name }}</h1>
                        <h3 class="text-sm text-indigo-700">{{ $user->email }}</h3>
                    </div>
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
                        <th class="px-5 py-6"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="border-b border-gray-200 bg-white text-sm text-gray-500">
                        <td class="px-5 py-6 ">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img src="{{
                                        url("https://i.pravatar.cc/150?u={!! $user->email !!}")
                                    }}"
                                    alt="avatar"
                                    class="w-full h-full rounded-full" />
                                </div>
                                <p class=" ml-3">
                                    {{ $user->email }}
                                </p>
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
                        <td class="px-5 py-6">
                            <a href="{{ url("/order/$order->id") }}" class="rounded-full bg-indigo-100
                                text-indigo-700 px-4 py-2">
                                Open
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</x-app-layout>