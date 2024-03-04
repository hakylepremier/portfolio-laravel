<?php

use App\Models\Project;

$projects = Project::where('published', true)->orderBy('order', 'desc')->limit(2)->get();
// $projects = Project::where('title', 'like', '%' . 'QQQQQQQQQ' . '%');
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::asset('resources/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ Vite::asset('resources/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ Vite::asset('resources/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ Vite::asset('resources/images/favicon/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- SVG -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-800" data-theme="mytheme">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white ">
        <header
            class="flex flex-col h-screen bg-[url('{{ Vite::asset('resources/images/bgrnd.jpg') }}')] bg-cover dark:bg-gray-800"
            style="background-image: url('{{ Vite::asset('resources/images/bgrnd.jpg') }}');background-blend-mode: multiply">
            <div class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">

                <nav class="flex flex-row items-center justify-between max-w-6xl p-4 m-auto " x-data="{ open: false, toggle() { this.open = !this.open; } }">
                    {{-- <x-navigation /> --}}
                    <a href="{{ route('home') }}">
                        <img src="{{ Vite::asset('resources/images/LOGO.svg') }}" alt="My logo" class="w-8 h-8">
                    </a>
                    {{-- <div @click="toggle"
                        class="hover:bg-gray-900 rounded text-white hover:text-accent cursor-pointer px-2 max-[400px]:block hidden">
                        <i class="fa-solid fa-bars text-inherit"></i>
                    </div> --}}
                    {{-- <div class="menu"></div> --}}
                    <ul class="flex gap-4 shrink-1">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact </a></li>
                    </ul>
                </nav>
            </div>
            <section class="flex items-center justify-center flex-1">
                <div class="relative w-full">
                    <div class="flex flex-col items-center justify-center max-w-3xl gap-8 pb-12 mx-auto ">
                        <h1 class="md:text-5xl sm:text-4xl text-3xl px-2 font-bold text-center uppercase">Hello, I'm
                            Humphrey Yeboah
                        </h1>
                        <h2 class="px-8 text-center">I'm a web and mobile app developer. I'm in
                            the process of creating
                            this
                            website to showcase my amazing projects and to make it easy for you to reach out to me for
                            your
                            own project needs. The website is still under construction, but you can find me on social
                            media
                            through the links below.</h2>
                        <a href="#contact" class="mx-auto text-center text-white btn btn-primary">Let's talk</a>
                    </div>
                    <article
                        class="absolute top-0 left-0 max-[900px]:hidden flex flex-col gap-1 p-1 bg-gray-800 rounded">
                        <a href="https://www.linkedin.com/in/humphrey-yeboah-9850881b3/"
                            class="p-3 text-white transition-colors rounded hover:bg-accent hover:text-gray-800"
                            target="_blank" rel="noopener noreferrer"><i
                                class="text-lg text-inherit fa-brands fa-linkedin"></i></a>
                        <a href="https://www.twitter.com/hakylepremier"
                            class="p-3 transition-colors rounded hover:bg-accent hover:text-gray-800" target="_blank"
                            rel="noopener noreferrer"><i class="text-lg text-inherit fa-brands fa-x-twitter"></i></a>
                        <a href="https://github.com/hakylepremier"
                            class="p-3 transition-colors rounded hover:bg-accent hover:text-gray-800" target="_blank"
                            rel="noopener noreferrer"><i class="text-lg text-inherit fa-brands fa-github"></i></a>
                        <a href="https://facebook.com/humphrey.yeboah.5"
                            class="p-3 transition-colors rounded hover:bg-accent hover:text-gray-800" target="_blank"
                            rel="noopener noreferrer"><i class="text-lg text-inherit fa-brands fa-facebook"></i></a>
                    </article>
                </div>
            </section>
        </header>

        <!-- Page Content -->
        <main>
            <div class="bg-gray-800">
                <section class="max-w-6xl sm:px-16 px-8 lg:py-24 py-20 mx-auto" id="about">
                    <div class="flex flex-col sm:gap-6 gap-3 items-center justify-center lg:pb-20 pb-16">
                        <h2
                            class="md:text-3xl text-2xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            About
                            Me</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl text-center">Here you will find more information about me, what I do,
                            and my
                            current
                            skills mostly in
                            terms of programming and technology</h3>
                    </div>
                    <div class="grid md:grid-cols-2 lg:gap-4 md:gap-6 gap-12">
                        <article class="">
                            <h4 class="sm:pb-8 pb-6 text-xl font-bold dark:text-white ">Get to know me!</h4>
                            <p class="pb-8 md:max-w-md dark:text-gray-300">
                                I'm a Frontend Web Developer building the Front-end of Websites and Web Applications
                                that
                                leads
                                to the success of the overall product. Check out some of my work in the Projects
                                section.
                                <br><br>

                                I also like sharing content related to the stuff that I have learned over the years in
                                Web
                                Development so it can help other people of the Dev Community. Feel free to Connect or
                                Follow
                                me
                                on my Linkedin where I post useful content related to Web Development and Programming
                                <br><br>

                                I'm open to Job opportunities where I can contribute, learn and grow. If you have a good
                                opportunity that matches my skills and experience then don't hesitate to contact me
                            </p>
                            <a href="#contact" class="text-center text-white btn btn-primary">Let's talk</a>
                        </article>
                        <article>
                            <h4 class="sm:pb-8 pb-6 text-xl font-bold dark:text-white ">Skills</h4>
                            <div>
                                <div class="mb-2 btn btn-neutral ">Lorem.</div>
                                <div class="mb-2 btn btn-neutral ">Atque.</div>
                                <div class="mb-2 btn btn-neutral ">Non!</div>
                                <div class="mb-2 btn btn-neutral ">Vel.</div>
                                <div class="mb-2 btn btn-neutral ">Eius.</div>
                                <div class="mb-2 btn btn-neutral ">Ea.</div>
                                <div class="mb-2 btn btn-neutral ">Voluptate?</div>
                                <div class="mb-2 btn btn-neutral ">Saepe.</div>
                                <div class="mb-2 btn btn-neutral ">Voluptatibus?</div>
                                <div class="mb-2 btn btn-neutral ">Impedit!</div>
                                <div class="mb-2 btn btn-neutral ">Dolorum!</div>
                                <div class="mb-2 btn btn-neutral ">Quaerat!</div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
            <section class="max-w-6xl px-4 lg:py-24 py-20 mx-auto">
                <div class="flex flex-col items-center justify-center sm:gap-6 gap-3 lg:pb-20 pb-12">
                    <h2
                        class=" md:text-3xl text-2xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                        Projects</h2>
                    <div class="w-8 h-1 rounded bg-primary"></div>
                    <h3 class="max-w-4xl text-center">Here are a few projects I have worked on.</h3>
                </div>
                <div class="flex flex-col items-center justify-center sm:gap-20 gap-12">
                    @forelse ($projects as $project)
                        <article>
                            <div class="object-contain md:p-8 p-4 bg-gray-800 rounded-3xl ">
                                @if ($project->photo)
                                    <img src="{{ asset('storage/' . $project->photo[0]) }}" alt=""
                                        class="w-full rounded-xl" />
                                @else
                                    <x-not-found-image />
                                @endif
                            </div>
                            <h3 class="py-6 text-xl font-bold text-center">{{ $project->title }}</h3>
                            <p class="text-center">{{ $project->summary }}</p>
                            <div class="flex items-center justify-center gap-4 pt-6">
                                <a href="{{ route('projects.show', ['project' => $project]) }}"
                                    class="text-center text-gray-800 btn btn-accent">Learn More</a>
                                @foreach ($project->links as $link)
                                    @if ($link->order >= 10)
                                        <a href="{{ $link->url }}" class="text-center text-white btn btn-primary"
                                            target="_blank" rel="noopener noreferrer">
                                            @if ($link->title)
                                                {{ $link->title }}
                                            @else
                                                {{ $link->link_type->title }}
                                            @endif
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </article>
                    @empty
                        <p class="text-center">No projects available at the moment</p>
                    @endforelse
                </div>
            </section>

            <div class="bg-gray-800">
                <section class="max-w-2xl px-4 py-24 mx-auto" id="contact">
                    <div class="flex flex-col sm:gap-6 gap-3 items-center justify-center pb-12">
                        <h2
                            class=" text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            Let's talk</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl text-center">Feel free to Contact me by submitting the form below and
                            I will get back to you as soon as possible</h3>
                    </div>
                    <livewire:contact-form />
                </section>
            </div>
        </main>
    </div>
    <footer class="py-12 bg-gray-950">
        <div class="max-w-4xl m-auto md:px-8">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
    <x-toast />

    @stack('modals')

    @livewireScripts
</body>

</html>
