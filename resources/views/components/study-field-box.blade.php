@props(['title', 'images', 'route'])

<a href="{{ route('course.laptop', ['course_id' => $route]) }}">
 
    <div class="sf-card">
        <div class="img">
            <img src="{{ asset('assets/images/' . $title.'.png') }}">
        </div>
        <p class="text-wrap lg:text-nowrap hover:underline bg-grey-800">
            {{ $title }}
        </p>
    </div>
</a>


<style>
    .sf-card {
        display: flex;
        flex-direction: column;
        max-width: 300px;
        border-radius: 0.5rem;
        border: 0;
        overflow: hidden;
        transition: 300ms ease-in-out;
        flex: 1;
        height: 100%;

        &:hover {
            transform: translateY(-2px);
        }
    }

    .img {
        width: 100%;
        padding: clamp(10px, 5%, 20px);
        background: #F5F5F5;

        img {
            width: 100%;
            border: 0;
            border-radius: 0.3rem;
        }
    }

    p {
        padding: 0.5rem 1rem;
        background: #333;
        height: 100%;
        color: #eee
    }
</style>
