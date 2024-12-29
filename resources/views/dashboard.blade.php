<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

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

        <section class="pt-10">
            <h4 class='text-red font-semibold px-2 py-0'>Laptop Recommendations For You</h4>
            <div class="flex flex-col justify-between">

                <h2 class="pt-0 pb-2">Popular Recommendation for {{ Auth::user()->course->name }} course</h2>
                <div class="grid grid-cols-4 gap-5">
                    @php
                        $laptops = \App\Models\Laptop::where('course_id', Auth::user()->course_id)
                            ->orderBy('id', 'desc')
                            ->take(4)
                            ->get();
                    @endphp

                    @foreach ($laptops as $laptop)
                        <x-laptop-box-homepage course="{{ $laptop->course->name }}"
                            title="{{ $laptop->brand }} {{ $laptop->model }}" image="{{ $laptop->img_url }}"
                            route="{{ $laptop->id }}" />
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pt-10 pb-10">
            <h4 class='text-red font-semibold'> Find Laptop by Study Field</h4>
            <div class="flex justify-between">
                <div class="flex flex-col justify-between px-5">
                    <h2 class="p-0">Popular Study Fields </h2>
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
            <h4 class='text-red font-semibold'>Recommendation laptops for other courses</h4>
            <div class="flex flex-col justify-between">

                <h2 class="">Latest Line-up</h2>
                <div class="grid grid-cols-4 gap-5">
                    @php
                        $laptops = \App\Models\Laptop::with(['course', 'company'])
                            ->orderBy('id', 'desc')
                            ->get();

                        $uniqueSelections = [];
                        $displayedLaptops = [];

                        foreach ($laptops as $laptop) {
                            // Combine course name and company id for uniqueness
                            if ($laptop->course && $laptop->company) {
                                $identifier = $laptop->course->name . '-' . $laptop->company->id;

                                if (!in_array($identifier, $uniqueSelections)) {
                                    $uniqueSelections[] = $identifier;
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
                    <div class="flex flex-col flex-1 justify-center">
                        <h3>
                            Our Mission
                        </h3>
                        <p class="text-justify">Our mission is to empower students by providing personalized laptop
                            recommendations that
                            match their unique requirements, preferences, and budget. We aim to enhance your
                            academic
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
                            enthusiasts and education advocates, came together to create a solution that addresses
                            this
                            challenge. We believe that every student deserves the best tools for success, and we are
                            dedicated to making that a reality. </p>
                    </div>
                    <div class="w-1 h-full mx-5"></div>
                    <div class="w-1/2"><img src="{{ asset('assets/images/welcome-img4.jpeg') }}" alt="img4"></div>

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
                        <p class="px-20 font-semibold" style="max-width: 65ch">StudentTech made choosing my new
                            laptop
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
</x-app-layout>

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
