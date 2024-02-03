<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-white ">
        <header
            class="flex flex-col h-screen bg-[url('{{ Vite::asset('resources/images/bgrnd.jpg') }}')] bg-cover dark:bg-gray-800"
            style="background-image: url('{{ Vite::asset('resources/images/bgrnd.jpg') }}');background-blend-mode: multiply">
            <nav
                class="flex flex-row items-center justify-between p-4 bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>
                <ul class="flex gap-2 text-white">
                    <li>Home</li>
                    <li>About</li>
                    <li>Project</li>
                    <li>Contact</li>
                </ul>
            </nav>
            <section class="flex items-center justify-center flex-1">
                <div class="w-full relative">
                    <div class="flex flex-col items-center justify-center max-w-3xl gap-8 pb-12 mx-auto ">
                        <h1 class="text-5xl font-bold text-center uppercase">Hello, I'm Humphrey Yeboah</h1>
                        <h2 class="px-8 text-center">I'm a web and mobile app developer. I'm in the process of creating
                            this
                            website to showcase my amazing projects and to make it easy for you to reach out to me for
                            your
                            own project needs. The website is still under construction, but you can find me on social
                            media
                            through the links below.</h2>
                        <a class="mx-auto text-center btn btn-primary">Let's talk</a>
                    </div>
                    <article class="bg-gray-800 gap-1 p-1 absolute left-0 top-0 flex flex-col rounded">
                        <a href="https://www.linkedin.com/in/humphrey-yeboah-9850881b3/"
                            class="p-3 rounded hover:bg-gray-600 transition-colors" target="_blank"
                            rel="noopener noreferrer"><i class="fa-brands text-lg fa-linkedin"></i></a>
                        <a href="https://www.twitter.com/hakylepremier"
                            class="p-3 rounded hover:bg-gray-600 transition-colors" target="_blank"
                            rel="noopener noreferrer"><i class="fa-brands text-lg fa-x-twitter"></i></a>
                        <a href="https://github.com/hakylepremier"
                            class="p-3 rounded hover:bg-gray-600 transition-colors" target="_blank"
                            rel="noopener noreferrer"><i class="fa-brands text-lg fa-github"></i></a>
                        <a href="https://facebook.com/humphrey.yeboah.5"
                            class="p-3 rounded hover:bg-gray-600 transition-colors" target="_blank"
                            rel="noopener noreferrer"><i class="fa-brands text-lg fa-facebook"></i></a>
                    </article>
                </div>
            </section>
        </header>

        <!-- Page Content -->
        <main>
            <div class="bg-gray-800">
                <section class="max-w-6xl px-4 py-24 mx-auto">
                    <div class="flex flex-col items-center justify-center pb-20">
                        <h2
                            class="pb-6 text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            About
                            Me</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl pt-6 text-center">Here you will find more information about me, what I do,
                            and my
                            current
                            skills mostly in
                            terms of programming and technology</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-4 ">
                        <article class="">
                            <h4 class="pb-8 text-xl font-bold dark:text-white ">Get to know me!</h4>
                            <p class="pb-8 md:max-w-md  dark:text-gray-300">
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
                            <a class="text-center btn btn-primary">Let's talk</a>
                        </article>
                        <article>
                            <h4 class="pb-8 text-xl font-bold dark:text-white ">Skills</h4>
                            <div>
                                <div class="mb-2 btn btn-accent ">Lorem.</div>
                                <div class="mb-2 btn btn-accent ">Atque.</div>
                                <div class="mb-2 btn btn-accent ">Non!</div>
                                <div class="mb-2 btn btn-accent ">Vel.</div>
                                <div class="mb-2 btn btn-accent ">Eius.</div>
                                <div class="mb-2 btn btn-accent ">Ea.</div>
                                <div class="mb-2 btn btn-accent ">Voluptate?</div>
                                <div class="mb-2 btn btn-accent ">Saepe.</div>
                                <div class="mb-2 btn btn-accent ">Voluptatibus?</div>
                                <div class="mb-2 btn btn-accent ">Impedit!</div>
                                <div class="mb-2 btn btn-accent ">Dolorum!</div>
                                <div class="mb-2 btn btn-accent ">Quaerat!</div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
            <section class="max-w-6xl px-4 py-24 mx-auto">
                <h2
                    class="pb-6 text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                    Projects</h2>
                <div class="flex flex-col items-center justify-center gap-20">
                    <article>
                        <div class="object-contain p-8 bg-gray-800 rounded-3xl ">
                            <img src="{{ Vite::asset('resources/images/news.jpeg') }}" class="w-full " alt="">
                        </div>
                        <h3 class="py-6 text-xl font-bold text-center">Responsive News Homepage</h3>
                        <p class="text-center">This is a challenge posed by <a href="">Frontend Mentor</a> to
                            build a
                            simple news website
                            homepage.</p>
                        <div class="flex items-center justify-center gap-4 pt-6">
                            <a href="https://hakylepremier.github.io/responsive-news-homepage-frontend/"
                                class="text-center btn btn-primary" target="_blank" rel="noopener noreferrer">Visit
                                Site</a>
                            <a href="https://github.com/hakylepremier/responsive-news-homepage-frontend" target="_blank"
                                rel="noopener noreferrer" class="text-center btn btn-primary">See the code</a>
                        </div>
                    </article>
                    <article>
                        <div class="object-contain p-8 bg-gray-800 rounded-3xl "><img
                                src="{{ Vite::asset('resources/images/room.jpeg') }}" class="w-full " alt="">
                        </div>
                        <h3 class="py-6 text-xl font-bold text-center">Responsive News Homepage</h3>
                        <p class="text-center">This is a challenge posed by <a href="">Frontend Mentor</a> to
                            build a
                            simple news website
                            homepage.</p>
                        <div class="flex items-center justify-center gap-4 pt-6">
                            <a href="https://room-homepage-haky.netlify.app/" class="text-center btn btn-primary"
                                target="_blank" rel="noopener noreferrer">Visit
                                Site</a>
                            <a href="https://github.com/hakylepremier/room-homepage-frontend" target="_blank"
                                rel="noopener noreferrer" class="text-center btn btn-primary">See the code</a>
                        </div>
                    </article>
                </div>
            </section>

            <div class="bg-gray-800">
                <section class="max-w-2xl px-4 py-24 mx-auto">
                    <div class="flex flex-col items-center justify-center pb-12">
                        <h2
                            class="pb-6 text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                            Let's talk</h2>
                        <div class="w-8 h-1 rounded bg-primary"></div>
                        <h3 class="max-w-4xl pt-6 text-center">Feel free to Contact me by submitting the form below and
                            I will get back to you as soon as possible</h3>
                    </div>
                    <livewire:contact-form />
                </section>
            </div>
        </main>
    </div>
    <x-toast />
    <footer class="py-12 bg-gray-950">
        <div class="max-w-4xl m-auto flex pb-6 border-b border-gray-600">
            <article class="flex-1">
                <h2 class="text-lg font-bold uppercase text-white pb-2">Humphrey Yeboah</h2>
                <p>A full stack and mobile developer ready to help to bring your business online.</p>
            </article>
            <article>
                <h2 class="text-lg font-bold uppercase text-white pb-2">Socials</h2>
                <div>
                    <a href="https://www.linkedin.com/in/humphrey-yeboah-9850881b3/"
                        class="p-2 rounded hover:bg-gray-800 transition-colors" target="_blank"
                        rel="noopener noreferrer"><i class="fa-brands text-lg fa-linkedin"></i></a>
                    <a href="https://www.twitter.com/hakylepremier"
                        class="p-2 rounded hover:bg-gray-800 transition-colors" target="_blank"
                        rel="noopener noreferrer"><i class="fa-brands text-lg fa-x-twitter"></i></a>
                    <a href="https://github.com/hakylepremier" class="p-2 rounded hover:bg-gray-800 transition-colors"
                        target="_blank" rel="noopener noreferrer"><i class="fa-brands text-lg fa-github"></i></a>
                    <a href="https://facebook.com/humphrey.yeboah.5"
                        class="p-2 rounded hover:bg-gray-800 transition-colors" target="_blank"
                        rel="noopener noreferrer"><i class="fa-brands text-lg fa-facebook"></i></a>
                </div>
            </article>
        </div>
        <p class="text-center px-2 pt-6">
            &copy; Copyright {{ Carbon\Carbon::now()->year }}, Made by <a href="http://humphreyyeboah.com"
                target="_blank" rel="noopener noreferrer" class="text-white font-bold">Humphrey Yeboah</a>
        </p>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>

    @stack('modals')

    @livewireScripts
</body>

</html>
