<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-2 py-3">
                <a href="{{ route('dashboard') }}" class="hover:underline">Home</a> / <a class="hover:underline"
                    href="{{ route('contact') }}">Contact</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col items-center justify-center">
                    <div class="flex flex-col gap-3 p-10">
                        <div class="flex gap-5">
                            <img src="{{ asset('assets/icons/ic_phone_red.svg') }}">
                            <h6>Call To Us</h6>
                        </div>

                        <p>We are available 24/7, 7 days a week.</p>
                        <p>Phone: +60172077042</p>

                    </div>
                    <div class="flex flex-col gap-3 p-10 pt-0">
                        <hr class="mb-8"/>
                        <div class="flex gap-5">
                            <img src="{{ asset('assets/icons/ic_mail_red.svg') }}">
                            <h6>Write To Us</h6>
                        </div>

                        <p>We are available 24/7, 7 days a week.</p>
                        <a href="mailto:studenttech131@gmail.com">Email: studenttech131@gmail.com</a>
                        <a href="mailto:crystallinhtet777@gmail.com">Email: crystallinhtet777@gmail.com</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
