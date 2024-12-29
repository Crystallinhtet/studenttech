<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin User Setup') }}
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
