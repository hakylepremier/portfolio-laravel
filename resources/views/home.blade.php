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
    <style>
        .mybg {
            background-image: radial-gradient(#0D6A87 0.5px, transparent 0.5px), radial-gradient(#0D6A87 0.5px, #fff 0.5px);
            background-size: 30px 30px;
        }

        @media (prefers-color-scheme: dark) {
            .mybg {
                background-image: url('{{ Vite::asset('resources/images/bgrnd.jpg') }}');
                background-size: auto auto;
                background-blend-mode: multiply;
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-600 dark:text-white bg-gray-100 dark:bg-gray-800" data-theme="mytheme">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white ">
        <header class="flex flex-col h-screen bg-ttuPattern dark:bg-blend-multiply dark:bg-gray-800 bg-cover mybg">
            <div class="bg-gray-200 border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700 ">

                <nav class="relative flex flex-row items-center justify-between max-w-6xl p-4 m-auto sm:static"
                    x-data="{ open: false, toggle() { this.open = !this.open; } }">
                    {{-- <x-navigation /> --}}
                    <a href="{{ route('home') }}">
                        <img src="{{ Vite::asset('resources/images/LOGO.svg') }}" alt="My logo" class="w-8 h-8">
                    </a>
                    <div @click.outside="open = false">
                        <div @click="toggle"
                            class="block px-3 py-1 dark:text-white text-gray-400 rounded cursor-pointer hover:dark:bg-gray-900 hover:dark:text-accent sm:hidden">
                            <i class="fa-solid fa-bars text-inherit"></i>
                        </div>

                        <ul class="fixed top-0 z-10 flex flex-col w-56 h-screen gap-0 pt-2 transition-all bg-gray-200 dark:bg-gray-800 border-l divide-y divide-gray-300 dark:divide-gray-700 sm:divide-y-0 sm:gap-4 shrink-1 sm:static sm:h-auto sm:flex-row sm:w-auto sm:pt-0 shrink basis-72 sm:border-l-0 dark:border-l-gray-900 border-l-gray-300 sm:z-auto"
                            x-bind:class="!open ? '-right-56' : 'right-0'" x-cloak>
                            <li class="flex justify-end px-4 sm:hidden">
                                <div @click="toggle"
                                    class="p-2 px-4 dark:text-white text-gray-400 rounded cursor-pointer hover:dark:bg-gray-900 hover:dark:text-accent ">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            </li>
                            <li @click="open = false"><a
                                    class="block p-4 sm:hover:dark:text-gray-400 sm:hover:text-red-500 hover:sm:dark:bg-inherit hover:dark:bg-gray-900 hover:bg-gray-300 hover:sm:bg-transparent sm:p-0"
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li @click="open = false"><a
                                    class="block p-4 sm:hover:dark:text-gray-400 sm:hover:text-red-500 hover:sm:dark:bg-inherit hover:dark:bg-gray-900 hover:bg-gray-300 hover:sm:bg-transparent sm:p-0"
                                    href="{{ route('projects.index') }}">Projects</a>
                            </li>
                            <li @click="open = false"><a
                                    class="block p-4 sm:hover:dark:text-gray-400 sm:hover:text-red-500 hover:sm:dark:bg-inherit hover:dark:bg-gray-900 hover:bg-gray-300 hover:sm:bg-transparent sm:p-0 grow"
                                    href="#about">About</a></li>
                            <li @click="open = false"><a
                                    class="block p-4 sm:hover:dark:text-gray-400 sm:hover:text-red-500 hover:sm:dark:bg-inherit hover:dark:bg-gray-900 hover:bg-gray-300 hover:sm:bg-transparent sm:p-0 grow"
                                    href="#contact">Contact </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <section class="flex items-center justify-center flex-1">
                <div class="relative w-full">
                    <div class="flex flex-col items-center justify-center max-w-3xl gap-8 pb-12 mx-auto ">
                        <h1 class="px-2 text-3xl font-bold text-center uppercase md:text-5xl sm:text-4xl">
                            Hello, I'm
                            Humphrey Yeboah
                        </h1>
                        <h2 class="px-8 text-center">I'm a full stack web and mobile app developer, a
                            robotics
                            enthusiast and a livelong learner. Let me help put your business online.</h2>
                        <a href="#contact" class="mx-auto text-center text-white btn btn-primary">Let's talk</a>
                    </div>
                    <article
                        class="absolute top-0 left-0 max-[900px]:hidden flex flex-col gap-1 p-1 bg-gray-300 dark:bg-gray-800 rounded">
                        <a href="https://www.linkedin.com/in/humphrey-yeboah-9850881b3/"
                            class="p-3 transition-colors rounded hover:bg-accent hover:text-gray-800" target="_blank"
                            rel="noopener noreferrer"><i class="text-lg text-inherit fa-brands fa-linkedin"></i></a>
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
            <div class="dark:bg-gray-800 bg-gray-200">
                <section class="max-w-6xl px-8 py-20 mx-auto sm:px-16 lg:py-24" id="about">
                    <div class="flex flex-col items-center justify-center gap-3 pb-16 sm:gap-6 lg:pb-20">
                        <h2
                            class="text-2xl font-bold text-center uppercase md:text-3xl after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            About
                            Me</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl text-center">Here you will find more information about me, what I do,
                            and my
                            current
                            skills mostly in
                            terms of programming and technology</h3>
                    </div>
                    <div class="grid gap-12 md:grid-cols-2 lg:gap-4 md:gap-6">
                        <article class="">
                            <h4 class="pb-6 text-xl font-bold sm:pb-8 dark:text-white ">Get to know me!</h4>
                            <p class="pb-8 md:max-w-md dark:text-gray-300">
                                I am a Full Stack web developer and mobile app developer based in Ghana. Check out some
                                of my work in the Projects
                                section.
                                <br><br>
                                I started my tech journey in high school where I participated in robotics competitions
                                with my high school. I went on to pursue Actuarial Science in university where I fell in
                                love with software, specifically web development. In university I also learnt to make
                                mobile apps, first with low code tools and then with react native.
                                <br><br>
                                I also taught
                                robotics during my time in university to broaden my understanding of technology outside
                                software alone. After completing my Bachelor's degree I taught basic web development in
                                a high school for a year.
                                <br><br>

                                I'm open to job opportunities where I can contribute, learn and grow. You can also reach
                                out to me if you want me to build your next website or mobile app.
                            </p>
                            <a href="#contact" class="text-center text-white btn btn-primary">Let's talk</a>
                        </article>
                        <article>
                            <h4 class="pb-6 text-xl font-bold sm:pb-8 dark:text-white ">Skills</h4>
                            <div class="text-white">
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">
                                    HTML & CSS</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">JavaScript</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Tailwind CSS
                                </div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">React JS</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Sass</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Pug JS</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Laravel</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Inertia JS</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Livewire</div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">React Native
                                </div>
                                <div class="inline-flex p-2 px-4 mb-2 text-sm rounded-md bg-neutral ">Expo Router</div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
            <section class="max-w-6xl px-4 py-20 mx-auto lg:py-24">
                <div class="flex flex-col items-center justify-center gap-3 pb-12 sm:gap-6 lg:pb-20">
                    <h2
                        class="text-2xl font-bold text-center uppercase md:text-3xl after:w-7 after:h-2 after:bg-slate-300 after:contents">
                        Projects</h2>
                    <div class="w-8 h-1 rounded bg-primary"></div>
                    <h3 class="max-w-4xl text-center">Here are a few projects I have worked on.</h3>
                </div>
                <div class="flex flex-col items-center justify-center gap-12 sm:gap-20">
                    @forelse ($projects as $project)
                        <article>
                            <div class="object-contain p-4 bg-gray-300 dark:bg-gray-800 md:p-8 rounded-3xl ">
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

            <div class="dark:bg-gray-800 bg-gray-200">
                <section class="max-w-2xl px-4 py-24 mx-auto" id="contact">
                    <div class="flex flex-col items-center justify-center gap-3 pb-12 sm:gap-6">
                        <h2
                            class="text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            Let's talk</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl text-center">Feel free to Contact me by submitting the form below
                            and
                            I will get back to you as soon as possible</h3>
                    </div>
                    <livewire:contact-form />
                </section>
            </div>
        </main>
    </div>
    <footer class="py-12 bg-gray-300 dark:bg-gray-950">
        <div class="max-w-4xl m-auto md:px-8">

            <x-footer />
        </div>
        <p class="pt-4 text-center text-gray-700 dark:block hidden dark:text-gray-300">Background photo by Felix
            Mittermeier:
            https://www.pexels.com/photo/blue-universe-956981/</p>
    </footer>
    <x-toast />

    @stack('modals')

    @livewireScripts
</body>

</html>
