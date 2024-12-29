@props(['course', 'title', 'image', 'route'])

<div class="laptop-card">
    <p class="bg-gray-950 text-white text-center p-1 w-full">
        {{ $course }}
    </p>
    <img src='{{ $image }}' class="p-3">

    <a class="w-full flex flex-col items-center" href="{{ route('laptop.details', ['laptop_id' => $route]) }}">
        <h5 class="font-semibold text-wrap text-center">{{ html_entity_decode($title) }}</h5>
        <x-primary-button>Check this laptop</x-primary-button>
    </a>

</div>


<style>
    .laptop-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        max-width: 250px;

        background: white;
        align-items: center;
        padding: 0 0 20px 0;
        border: 1px solid #fff0;
        transition: 300ms;

        &:hover {
            cursor: pointer;
            border: 1px solid #eee;
            transform: translateY(-3px);
        }
    }
</style>
