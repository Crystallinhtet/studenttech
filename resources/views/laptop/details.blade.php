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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex gap-12">
                    <div class="bg-gray-100 px-3 py-5 flex items-center w-1/3">
                        <img class="prod-img" src='{{ $laptop->img_url }}' alt='{{ $laptop->model }}' />
                    </div>
                    <div class="flex flex-col flex-1">
                        <h2>
                            {{ $laptop->company->name }} {{ $laptop->model }}
                        </h2>

                        <h3>RM {{ $laptop->price }}</h3>
                        <div class="max-h-72 overflow-y-hidden bg-gray-200">
                            <p class="p-5 h-full overflow-y-scroll"> {!! nl2br(e($laptop->desc)) !!} </p>
                        </div>

                        <div class="w-full p-10">
                            <hr />
                        </div>

                        <div class="flex gap-5 px-10">
                            <a href="{{ $laptop->url }}" target="_blank">
                                <x-primary-button>
                                    Buy Now
                                </x-primary-button>
                            </a>
                            <a href="{{ $laptop->company->url }}" target="_blank">
                                <x-primary-button>
                                    Company Reference
                                </x-primary-button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <h2 class="text-center py-8">
                Community Reviews
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col gap-5">

                    <h4>Leave your review:</h4>
                    <form class="flex flex-col justify-center mr-3 ml-0 my-0 items-center w-full gap-3" method="POST"
                        action="{{ route('review.create', ['laptop_id' => $laptop->id]) }}">
                        @csrf

                        <div class="flex gap-3 w-full items-center">
                            <label for="rating">Rating: </label>
                            <div class="rating flex justify-left items-center">
                                <input type="radio" name="rating" id="star5" value="5" required>
                                <label for="star5" title="5 stars">☆</label>
                                <input type="radio" name="rating" id="star4" value="4" required>
                                <label for="star4" title="4 stars">☆</label>
                                <input type="radio" name="rating" id="star3" value="3" required>
                                <label for="star3" title="3 stars">☆</label>
                                <input type="radio" name="rating" id="star2" value="2" required>
                                <label for="star2" title="2 stars">☆</label>
                                <input type="radio" name="rating" id="star1" value="1" required>
                                <label for="star1" title="1 star">☆</label>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full items-start">
                            <label for="description" class="pt-3">Comment: </label>
                            <textarea id="comment" class="p-3 border-2 border-gray-200 rounded-lg w-full" rows="2" name="comment" required></textarea>
                        </div>

                        <div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="laptop_id" value="{{ $laptop->id }}">
                        </div>

                        <div class="w-full flex justify-end">
                            <x-primary-button type="submit">Submit</x-primary-button>
                        </div>

                    </form>

                    <hr />
                    <div class="flex flex-col gap-3" style="max-height: 600px">
                        @foreach ($reviews as $review)
                        @php
                        if ($review->user_id == null)
                            $review->user_id = 0; 
                        @endphp
                            <div class="flex flex-col p-3 border border-gray-200 hover:border-gray-300 rounded-md">
                                <div class="flex gap-5 items-center">
                                    <h4 class="text-2xl font-semibold">{{ $review->user->name }}</h4>
                                    <div class="text-xl font-medium text-nowrap">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            ☆
                                        @endfor
                                    </div>
                                    @if ($review->user->id == Auth::user()->id)
                                        <div class="w-full flex justify-end">
                                            <form method="POST"
                                                action="{{ route('review.destroy', ['review_id' => $review->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <x-primary-button>
                                                    Delete
                                                </x-primary-button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex gap-5">
                                    <div class="flex w-full p-2 border border-gray-200 rounded-md">
                                        {{ $review->comment }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>

<style>
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
