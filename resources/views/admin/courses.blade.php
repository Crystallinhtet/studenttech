<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Course Setup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="navbar">
                        <a href="{{ route('admin.companies') }}">Companies</a>
                        <a href="{{ route('admin.courses') }}">Courses</a>
                        <a href="{{ route('admin.laptops') }}">Laptops</a>
                    </div>

                </div>
            </div>

            <div>

                <form class="flex flex-col gap-3 w-full p-3" method="POST" action="{{ route('course.create') }}">
                    @csrf
                    <h3 class="text-nowrap flex items-center">Add new course:</h3>

                    <div class="flex items-end gap-2">

                        <div class="flex flex-col gap-2">
                            <label for="code">Course Code:</label>
                            <input name="code" id="code" type="text"
                                class="bg-none border-0 rounded-lg w-full" required>
                        </div>

                        <div class="flex w-full  flex-col  gap-2">
                            <label for="name">Course Name:</label>
                            <input type="text" id="name" name="name"
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
                                <td class="px-1">Course Code</td>
                                <td class="w-full px-1">Course Name</td>
                                <td class="px-1">Settings</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($courses as $course)
                                <tr>
                                    <td class="px-1">{{ $counter }}</td>
                                    <td class="px-1">
                                        <form method="POST"
                                            action="{{ route('course.update', ['id' => $course->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input name="code" value="{{ $course->code }}"
                                                class="bg-none border-0 rounded-lg  px-3 py-2" required>

                                    </td>
                                    <td class="px-1">
                                        <input name="name" type="text" value="{{ $course->name }}"
                                            class="bg-none border-0 rounded-lg w-full" required>
                                    </td>

                                    <td class="p-3 flex flex-nowrap gap-3 justify-center">
                                        <x-secondary-button type="submit"
                                            class="btn upt text-center">Update</x-secondary-button>
                                        </form>

                                        <form class="w-fit" method="POST"
                                            action="{{ route('course.delete', ['id' => $course->id]) }}">

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
