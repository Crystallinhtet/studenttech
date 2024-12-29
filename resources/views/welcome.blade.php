<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sec2-container {
            display: grid;
            grid-auto-rows: auto;
            grid-auto-flow: column;
            gap: 1.5rem;

            a {
                width: min-content;
                padding: 10px;
                text-wrap: wrap;
                border: 1px solid #ccc;
                border-radius: 0.3rem;
                aspect-ratio: 1;
                display: flex;
                align-items: end;
                transition: 300ms;

                &:hover {
                    background: var(--red-main);
                    color: #fff;
                }
            }
        }
    </style>

</head>

<body class="font-sans antialiased flex flex-col w-full">
    <div class="bg-gray-900 w-full h-8"></div>
    <header class="w-full grid grid-cols-2 items-center gap-2 lg:grid-cols-3">
        <div class="w-full flex justify-center">
            <img src="{{ asset('assets/images/logo.png') }}">
        </div>
        <div class="flex h-full lg:justify-center lg:col-start-2">
            <div class="flex h-full items-center lg:justify-center lg:col-start-2 text-gray-800">
                <a href="{{ route('welcome') }}"
                    class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Home</a>
                <a href="{{ route('contact') }}"
                    class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Contact</a>
                <a href="{{ route('about') }}"
                    class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">About</a>
                <a href="{{ route('register') }}"
                    class="px-8 h-full flex items-center hover:cursor-pointer hover:bg-gray-100 duration-300">Register</a>
            </div>
        </div>
        @if (Route::has('login'))
            <nav class="flex flex-1 justify-end pr-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]   ">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]   ">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]   ">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <section class="bg-gray-900 text-gray-50 p-5">
            <div class="flex justify-between">
                <div class="flex flex-col justify-between p-5">
                    <img src="{{ asset('assets/images/logo.png') }}" class="w-36">
                    <h1 class="pt-10">
                        Get your <br>
                        Ideal Laptop
                    </h1>
                    <a href="{{ route('course.index') }}"
                        class="bg-white px-8 py-3 mt-10 mb-20 text-gray-950 text-nowrap w-min border border-white hover:text-white hover:bg-gray-950 cursor-pointer duration-300">
                        Personalize My Laptop
                    </a>
                </div>

                <div class="flex py-10 items-end">
                    <div>
                        <img src="{{ asset('assets/images/welcome-img1.png') }}" style="max-width: 500px; height:auto">
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-10">
            <h4 class='text-red font-semibold'> Find Laptop by Study Field</h4>
            <div class="flex justify-between">
                <div class="flex flex-col justify-between px-5">
                    <h2 class="">Popular Study Fields </h2>
                    <div class="sec2-container">
                        <a href="{{ route('course.laptop', ['course_id' => 1]) }}" class="square">
                            Information Technology
                        </a>
                        <a href="{{ route('course.laptop', ['course_id' => 2]) }}" class="square">
                            Engineering
                        </a>
                        <a href="{{ route('course.laptop', ['course_id' => 3]) }}" class="square">Human Science
                        </a>
                        <a href="{{ route('course.laptop', ['course_id' => 4]) }}" class="square">Business
                        </a>
                        <a href="{{ route('course.laptop', ['course_id' => 5]) }}" class="square">Architecture
                        </a>
                        <a href="{{ route('course.index') }}" class="square">Show All
                        </a>

                    </div>

                </div>
            </div>
        </section>

        <section class="py-10">
            <h4 class='text-red font-semibold'>Recommendation laptops for all students</h4>
            <div class="flex flex-col justify-between">

                <h2 class="">Popular Recommendation</h2>
                <div class="grid grid-cols-4 gap-5">
                    @php
                        $laptops = \App\Models\Laptop::with(['course', 'company'])
                            ->orderBy('id', 'desc')
                            ->get();

                        $uniqueCourses = [];
                        $uniqueCompanies = [];
                        $displayedLaptops = [];

                        foreach ($laptops as $laptop) {
                            if ($laptop->course && $laptop->company) {
                                // Check for unique course_id and company_id
                                if (
                                    !in_array($laptop->course->id, $uniqueCourses) &&
                                    !in_array($laptop->company->id, $uniqueCompanies)
                                ) {
                                    $uniqueCourses[] = $laptop->course->id;
                                    $uniqueCompanies[] = $laptop->company->id;
                                    $displayedLaptops[] = $laptop;

                                    // Stop when we have 4 unique combinations
                                    if (count($displayedLaptops) == 4) {
                                        break;
                                    }
                                }
                            }
                        }
                    @endphp


                    @foreach ($displayedLaptops as $laptop)
                        <x-laptop-box-homepage course="{{ $laptop->course->name }}"
                            title="{{ $laptop->brand }} {{ $laptop->model }}" image="{{ $laptop->img_url }}"
                            route="{{ $laptop->id }}" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-gray-900 text-gray-50 p-5">
            <div class="flex justify-between">
                <div class="flex flex-col justify-between p-5">
                    <h4 class='text-green font-semibold'>Categories</h4>

                    <h2>
                        Enhance Your<br> Laptop Experience
                    </h2>
                    <a href="{{ route('course.index') }}"
                        class="bg-green px-8 py-3 mt-10 mb-20 text-gray-950 text-nowrap w-min border border-green hover:text-white hover:bg-gray-950 cursor-pointer duration-300">
                        Find My Laptop
                    </a>
                </div>

                <div class="flex p-10 items-end">
                    <div>
                        <img src="{{ asset('assets/images/welcome-img2.png') }}" style="max-width: 400px; height:auto">
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="flex flex-col py-20 gap-10">
                <div class="flex">

                    <div class="w-1/2"><img src="{{ asset('assets/images/welcome-img3.png') }}" alt="img4"></div>
                    <div class="w-1 h-full mx-5"></div>
                    <div class="flex flex-col flex-1">
                        <h3>
                            Our Mission
                        </h3>
                        <p class="text-justify">Our mission is to empower students by providing personalized laptop
                            recommendations that
                            match their unique requirements, preferences, and budget. We aim to enhance your academic
                            journey by ensuring you have the best technology to support your studies.
                        </p>
                    </div>

                </div>
                <div class="flex">
                    <div class="flex flex-col flex-1 justify-center">
                        <h3>Our Story
                        </h3>
                        <p class="text-justify">StudentTech was born out of the realization that students often
                            struggle
                            with choosing the right laptop amidst a sea of options. Our team, comprised of tech
                            enthusiasts and education advocates, came together to create a solution that addresses this
                            challenge. We believe that every student deserves the best tools for success, and we are
                            dedicated to making that a reality. </p>
                    </div>
                    <div class="w-1 h-full mx-5"></div>
                    <div class="w-1/2"><img src="{{ asset('assets/images/welcome-img4.jpeg') }}" alt="img4">
                    </div>

                </div>
            </div>
        </section>

        <section class="bg-white pt-10 pb-16">
            <div class="flex flex-col gap-10 items-center">
                <div class="w-min flex flex-col items-center">
                    <h1 class="text-center text-nowrap">
                        Our Testimonials
                    </h1>
                    <div class="border border-red-500 w-1/2"></div>
                </div>

                <div class="flex">
                    <img src="{{ asset('assets/icons/ic_big-quote.svg') }}" style="max-width: 100px">
                    <div>
                        <p class="px-20 font-semibold" style="max-width: 65ch">StudentTech made choosing my new laptop
                            so much easier! The personalized recommendations were spot on, and I loved how I could
                            compare different models side by side. It saved me a ton of time and stress.</p>
                        <p class="px-20 py-5 text-red font-bold">~ Emily R., College Student ~
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <section class="py-10">
            <div class="flex flex-col items-center gap-20 p-5">
                <div class="flex flex-col items-center">
                    <h1>Newsletter</h1>
                    <p class="text-red font-semibold">Stay up-to-date with our latest news.</p>
                    <a class="mt-10 bg-green text-black font-semibold rounded px-5 py-2 text-nowrap w-min"
                        href="mailto:studenttech@gmail.com">Sign Up</a>
                </div>
                <p>
                    Have questions or need assistance? Feel free to reach out to our support team at
                    studenttech@gmail.com.
                    We're here to help!
                </p>
            </div>

        </section>

    </main>
    <x-footer />
</body>

</html>
