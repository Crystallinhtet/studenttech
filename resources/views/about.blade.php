<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-2 py-3">
                <a href="{{route('dashboard')}}" class="hover:underline">Home</a> / <a class="hover:underline" href="{{route('about')}}">About</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex py-10">
                        <div class="w-1/2 flex items-center">
                            <p class="text-justify">
                                Welcome to StudentTech, your go-to platform for finding the perfect laptop tailored to your
                                academic needs. We understand that choosing the right laptop can be overwhelming with so
                                many options available. That's why we created StudentTech – to simplify the process and help
                                you make an informed decision quickly and easily.
                                <br>
                                <br>
                                Join the StudentTech community and take the first step towards finding the perfect laptop
                                for your educational journey. Let us help you navigate the complex landscape of laptop
                                selection with ease and confidence.
    
    
                            </p>
                        </div>
                        <div class="mx-3"></div>
                        <div class="flex-1">
                            <img src="{{ asset('assets/images/about-img1.png') }}">
                        </div>
                    </div>

                    <div class="flex py-10"> 
                        <div class="flex-1 items-center">
                            <img src="{{ asset('assets/images/sf-img.png') }}">
                        </div>
                        <div class="mx-3"></div>
                        <div class="w-1/2 flex flex-col justify-center">
                            <h2>Find a perfect laptop
                                based on your Study Fields</h2>
                            <a href="{{route('course.index')}}" class="px-5 py-3 bg-red text-white border-2 border-red-500 duration-300 text-nowrap w-min hover:bg-[#fff] hover:text-red-600">
                                Find My Laptop
                            </a>
                        </div>
                       
                    </div>

                    <div class="flex py-10">
                        <div class="w-1/2 flex items-center">
                            <h3 class="text-justify">
                                And Acknowledge How Technology<br>
                                Can Help You Achieve <br>
                                Academic Success.
                                <br><br>
                                This Is The Motivation <br>
                                Behind All We Do.
                            </h3>
                        </div>
                        <div class="mx-3"></div>
                        <div class="flex-1">
                            <img src="{{ asset('assets/images/about-img1.png') }}">
                        </div>
                    </div>

                    <p class="w-full text-center">Have questions or need assistance? Feel free to reach out to our support team at studenttech@gmail.com. We're here to help!</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
