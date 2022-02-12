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
                                    <img class="w-full h-full rounded-full" src={{
                                        url("https://i.pravatar.cc/150?img={!! $order->user->id !!}")
                                    }}/>
                                </div>
                                <p class=" ml-3">
                                    {{ $order->user->email }}
                                </p>
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
                        <td class="px-5 py-6">
                            <p>
                                {{ App\Models\Book::where("order_id", $order->id)->get()->count() }}
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
        </div>
    </div>
</x-app-layout>