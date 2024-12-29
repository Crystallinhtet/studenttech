<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laptop Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- {{ $laptop }} --}}
            <div class="flex gap-2 py-3">
                <x-primary-button>
                    <a href="{{ url()->previous() }}">Go Back</a>
                </x-primary-button>
            </div>

            <form method="post" action="{{ route('laptop.update', ['id' => $laptop->id]) }}">
                @csrf
                @method('PUT')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex gap-12">
                        <div class="bg-gray-100 px-3 py-5 gap-5 flex flex-col items-center w-1/3">
                            <img class="prod-img" src='{{ $laptop->img_url }}' alt='{{ $laptop->model }}' />
                            <div class="flex w-full flex-col gap-2">
                                <label for="img_url">Image URL:</label>
                                <input type="text" id="img_url" name="img_url" class="bg-none border-0 rounded-lg"
                                    value="{{ $laptop->img_url }}" required>
                            </div>
                        </div>
                        <div class="flex flex-col flex-1">
                            <div class="flex gap-3">
                                <div class="flex flex-col">
                                    <label for="company_id" class=" text-nowrap">Brand:</label>
                                    <select class="border-0 bg-gray-100 rounded-lg text-2xl" id="company_id"
                                        name="company_id">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                {{ $company->id == $laptop->company_id ? 'selected' : '' }}>
                                                {{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex-col flex w-full">
                                    <label for="model" class=" text-nowrap">Model:</label> 
                                    <input type="text" id="model" name="model" value="{{ $laptop->model }}"
                                        class="bg-gray-100 text-2xl border-0 rounded-lg w-full" required>
                                </div>

                            </div>

                            <div class="flex justify-between gap-3">
                                <div class="flex flex-col items-start py-3 w-full">
                                    <label for="price" class=" text-nowrap">Price : RM </label>
                                    <input type="text" id="price" name="price"
                                        class="bg-gray-100 border-0 rounded-lg w-full" value="{{ $laptop->price }}"
                                        required>
                                </div>

                                <div class="py-3 flex flex-col w-min">
                                    <label>Course Reference:</label>
                                    <select class="border-0 bg-gray-100 rounded-lg" id="course_id" name="course_id">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == $laptop->course_id ? 'selected' : '' }}>
                                                {{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <textarea name="desc" id="desc" class="p-5 w-full bg-gray-100 rounded-lg border-0" rows="8"> {!! nl2br(e($laptop->desc)) !!} </textarea>


                            <div class="w-full p-10">
                                <hr />
                            </div>

                            <div class="flex w-full flex-col gap-2">
                                <label for="url">Buying URL:</label>
                                <input type="text" id="url" name="url"
                                    class="bg-gray-100 border-0 rounded-lg" value="{{ $laptop->url }}" required>
                            </div>

                            <div class="flex gap-5 py-5">
                                <a type="submit">
                                    <x-primary-button>
                                        Save
                                    </x-primary-button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
</x-app-layout>

<style>
    .product-name {
        font-size: 24px
    }

    .prod-img {
        width: 100%;
        max-width: 800px;
    }

    .rating {
        direction: rtl;
        font-size: 2rem;
        unicode-bidi: bidi-override;
    }

    .rating>input {
        display: none;
    }

    .rating>label {
        color: #ddd;
        cursor: pointer;
    }

    .rating>input:checked~label,
    .rating>input:checked~label~label {
        color: #000;

    }

    .rating>input:hover~label,
    .rating>input:hover~label~label {
        color: #666;
    }
</style>
