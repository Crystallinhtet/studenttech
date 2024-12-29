<footer>
    <div class="flex gap-10 w-full justify-center">
        <a href="https://facebook.com">
            <img src="{{ asset('assets/icons/ic_fb.svg') }}">
        </a>
        <a href="https://instagram.com">
            <img src="{{ asset('assets/icons/ic_ig.svg') }}">
        </a>
    </div>
    <div class="flex gap-5">
        <div class="flex h-full items-center lg:justify-center lg:col-start-2 text-gray-50">
            <a href="{{route('dashboard')}}" class="px-8 h-full flex items-center hover:cursor-pointer duration-300">Home</a>
            <a href="{{route('contact')}}" class="px-8 h-full flex items-center hover:cursor-pointer duration-300">Contact</a>
            <a href="{{route('about')}}" class="px-8 h-full flex items-center hover:cursor-pointer duration-300">About</a> 
        </div>
    </div>
    <p class="w-9/12 text-white text-center pt-6 border-t">
        © 2024 StudentTech. Empowering learners through technology. All rights reserved.
    </p>
</footer>
