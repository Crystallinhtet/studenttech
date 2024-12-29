<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Study Fields') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-2 py-3">
                <a href="{{route('dashboard')}}" class="hover:underline">Home</a> / <a class="hover:underline" href="{{route('course.index')}}">Study Fields</a>
            </div>
            {{-- {{$courses}} --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach ($courses as $course)
                        <x-study-field-box title="{{$course->name}}" route='{{$course->id}}' />  
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="flex items-center flex-wrap max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="p-5 text-3xl font-bold" style="max-width: 28ch">
                And Acknowledge How Technology Can Help You Achieve <br>
                Academic Success.<br>
                <br>
                This Is The Motivation Behind All We Do.
            </h4>
            <img src="{{ asset('assets/images/sf-img.png') }}" class="w-full" style="max-width: 600px">
        </div>
    </div>
</x-app-layout>
