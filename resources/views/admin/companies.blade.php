<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Company Setup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="navbar">
                        <a href="{{ route('admin.companies') }}">Companies</a>
                        <a href="{{ route('admin.courses') }}">Courses</a>
                        <a href="{{ route('admin.laptops') }}">Laptops</a></div>

                </div>
            </div>

            <div>

                <form class="flex flex-col gap-3 w-full p-3" method="POST" action="{{ route('company.create') }}">
                    @csrf
                    <h3 class="text-nowrap flex items-center">Add new company:</h3>

                    <div class="flex items-end gap-2">

                        <div class="flex flex-col gap-2">
                            <label for="name">Company Name:</label>
                            <input name="name" type="text" class="bg-none border-0 rounded-lg w-full" required>
                        </div>

                        <div class="flex w-full  flex-col  gap-2">
                            <label for="url">Company url:</label>
                            <input type="text" id="url" name="url"
                                class="bg-none border-0 rounded-lg w-full" required>
                        </div>

                        <x-primary-button type="submit" class="h-min mb-1">Add</x-primary-button>
                    </div>
                </form>

                <div class="w-full py-5 overflow-auto">
                    <table class="w-full">
                        <thead class="border-b-2 border-gray-900 ">
                            <tr class="text-nowrap">
                                <td class="px-1">No.</td>
                                <td class="px-1">Company Name</td>
                                <td class="px-1 w-full">URL Redirection</td>
                                <td class="px-1">Settings</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($companies as $company)
                                <tr>
                                    <td class="px-1">{{ $counter }}</td>
                                    <td class="px-1">
                                        <form method="POST"
                                            action="{{ route('company.update', ['id' => $company->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input name="name" value="{{ $company->name }}"
                                                class="bg-none border-0 rounded-lg px-3 py-2" required>

                                    </td>
                                    <td>
                                        <input name="url" type="text" value="{{ $company->url }}"
                                            class="bg-none border-0 rounded-lg w-full" required>
                                    </td>

                                    <td class="p-3 flex flex-nowrap gap-3 justify-center">
                                        <x-secondary-button type="submit"
                                            class="btn upt text-center">Update</x-secondary-button>
                                        </form>

                                        <form class="w-fit" method="POST"
                                            action="{{ route('company.delete', ['id' => $company->id]) }}">

                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="btn dlt w-full text-center"
                                                type="submit">Delete</x-danger-button>
                                        </form>

                                    </td>

                                </tr>
                                @php $counter++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .navbar a {
        padding: 20px 30px;
        border: solid 1px #0000;

        &:hover {
            background: none;
            cursor: pointer;
            scale: 1.2;
            border-bottom: 2px solid #0003;
            /* border-bottom: 2px solid #818cf8; */
        }

    }
</style>
