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
            <form action="/admin" class="mt-10 flex items-center space-x-4 rounded-lg">
                <input name="username"
                    class="rounded-md border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    type="text" placeholder="username" />
                <select name="role" id=""
                    class="text-sm text-gray-500 border-0 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md">
                    <option value="" defualt>Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit"
                    class=" bg-indigo-200 py-2 px-4 text-indigo-700 rounded-lg cursor-pointer flex items-center space-x-2">
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
            </form>
            @if (session()->has('success'))
            <x-validation-success class="mt-10" :success="session('success')" />
            @endif
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
                            <div class="flex items-center space-x-2">
                                <img src="{{ $user->image ? asset('/storage/'.$user->image) : asset('img/images.png') }}"
                                    alt="avatar" class="w-10 h-10 rounded-full object-cover" />
                                <div class="flex flex-col">
                                    <div class="flex space-x-1 items-center">
                                        <h3 class="ml-3 font-bold text-gray-800">{{ $user->username }}</h3>
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
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>