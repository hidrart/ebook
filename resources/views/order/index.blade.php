<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                Order Index Page
            </div>
            @if (session()->has('success'))
            <x-validation-success class="mt-10" :success="session('success')" />
            @endif
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
                                <img src="{{ $user->image ? asset('/storage/'.$user->image) : asset('img/images.png') }}"
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
                            <p>{{ $order->user->role }}</p>
                        </td>
                        <td class="px-5 py-6">
                            <p>
                                {{ \Carbon\Carbon::parse($order->order_date)->diffForHumans() }}
                            </p>
                        </td>
                        <td class="px-5 py-6 pl-14">
                            <p>
                                {{ App\Models\Book::where("order_id", $order->id)->get()->count() }}
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
        </div>
    </div>
</x-app-layout>