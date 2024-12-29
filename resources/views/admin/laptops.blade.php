<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Laptops Setup') }}
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



                <form class="flex flex-col gap-3 w-full p-3" method="POST" action="{{ route('laptop.create') }}">
                    @csrf
                    <h3 class="text-nowrap flex items-center">Add new laptop:</h3>

                    <div class="flex flex-col gap-2">
                        <div class="flex gap-3">
                            <div class="flex flex-col gap-2">
                                <label for="company_id">Brand:</label>
                                <select class="border-0 rounded-lg px-3 py-2" id="company_id" name="company_id">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col flex-1 gap-2">
                                <label for="model">Model:</label>
                                <input type="text" id="model" name="model"
                                    class="bg-none border-0 rounded-lg w-full" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="course_id">Suggested Course:</label>
                                <select class="border-0 rounded-lg px-3 py-2 pr-10" id="course_id" name="course_id">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex w-full flex-col gap-2">
                            <label for="img_url">Image URL:</label>
                            <input type="text" id="img_url" name="img_url" class="bg-none border-0 rounded-lg"
                                required>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex w-full flex-col gap-2">
                                <label for="url">Buying URL:</label>
                                <input type="text" id="url" name="url" class="bg-none border-0 rounded-lg"
                                    required>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="price">Price (RM):</label>
                                <input type="text" id="price" name="price" class="bg-none border-0 rounded-lg"
                                    required>
                            </div>
                        </div>

                        <div class="flex w-full flex-col gap-2">
                            <label for="desc">Description:</label>
                            <textarea id="desc" rows="5" name="desc" class="bg-none border-0 rounded-lg" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <x-primary-button type="submit" class="w-min mb-1">Add</x-primary-button>
                        </div>
                    </div>
                </form>

                <div class="w-full py-5 overflow-auto">
                    <table class="w-full">
                        <thead class="border-b-2 border-gray-900 ">
                            <tr class="text-nowrap">
                                <td class="p-3">No.</td>
                                <td class="p-3">Course</td>
                                <td class="p-3">Brand</td>
                                <td class="p-3 w-full">Model </td>
                                <td>Settings</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp

                            @foreach ($laptops as $laptop)
                                <tr>
                                    <td class="p-3"> {{ $counter }} </td>
                                    <td class="p-3"> {{ $laptop->course->name }} </td>
                                    <td class="p-3"> {{ $laptop->brand }} </td>
                                    <td class="p-3">{{ $laptop->model }} </td>

                                    <td class="p-3 flex flex-nowrap gap-3 justify-center">
                                        <x-secondary-button class="btn upt text-center">
                                            <a href="{{ route('laptop.edit', ['id' => $laptop->id]) }}">Update</a>
                                        </x-secondary-button>
                                        </form>

                                        <form class="w-fit" method="POST"
                                            action="{{ route('laptop.delete', ['id' => $laptop->id]) }}">

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
