<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laptop List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- {{ $course }}<br>{{ $laptops }} --}}
            <div class="flex gap-2 py-3">
                <a class="hover:underline" href="{{ route('dashboard') }}">Home</a> / <a class="hover:underline" href="{{ route('course.index') }}">Study Fields</a> / <a
                  class="hover:underline"  href="{{ route('course.laptop', ['course_id' => $course->id]) }}">{{ $course->name }}</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col pb-5">
                        <h3>
                            Study Field
                        </h3>

                        <h4>
                            {{ $course->name }}
                        </h4>
                    </div>

                    <div class="w-full grid grid-cols-4 gap-5">
                        @if ($laptops->count() == 0) 
                                <h5 class="text-nowrap">
                                    Sorry, product not found
                                </h5> 
                        @else
                            @foreach ($laptops as $laptop)
                                <x-laptop-box title='{{$laptop->company->name}} {{$laptop->model}}'
                                    image='{{$laptop->img_url}}'
                                    route='{{ $laptop->id }}' />
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
