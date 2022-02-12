<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-6">
                User Index Page
            </div>
            <form action="/admin" class="mt-10 flex items-center space-x-6 rounded-lg">
                <input name="username"
                    class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    type="text" placeholder="username" />
                <select name="role" id=""
                    class="text-sm text-gray-500 border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md">
                    <option value="" defualt>Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" class="bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer">
                    Search </button>
            </form>
            <table class="mt-10 min-w-full rounded-lg overflow-hidden">
                <thead>
                    <tr class="text-gray-800 bg-gray-200 text-sm text-left font-semibold uppercase tracking-wider">
                        <th class="px-5 py-6"> Name </th>
                        <th class="px-5 py-6"> Role </th>
                        <th class="px-5 py-6"> Created</th>
                        <th class="px-5 py-6"> Order </th>
                        <th class="px-5 py-6"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b border-gray-200 bg-white text-sm text-gray-500">
                        <td class="px-5 py-6 ">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img src="{{ url("https://i.pravatar.cc/150?u={!! $user->email !!}") }}"
                                    alt="avatar"
                                    class="w-full h-full rounded-full" />
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="ml-3 font-bold text-gray-800">{{ $user->name }}</h3>
                                    <p class=" ml-3 text-sm">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-6">
                            <p>{{ $user->role }}</p>
                        </td>
                        <td class="px-5 py-6">
                            <p>
                                {{ $user->created_at->diffForHumans() }}
                            </p>
                        </td>
                        <td class="px-5 py-6 pl-10">
                            <p>
                                {{ $user->order->count() }}
                            </p>
                        </td>
                        <td class="px-5 py-6">
                            <a href="{{ url("/admin/$user->id") }}" class="rounded-full bg-indigo-100
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