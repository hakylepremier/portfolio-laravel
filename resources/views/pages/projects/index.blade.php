<?php

use App\Models\Project;

use function Laravel\Folio\name;

use Illuminate\View\View;

use function Laravel\Folio\render;

name('projects.index');
?>

@php $projects = Project::latest()->get(); @endphp

<x-guest-layout>
    <header class="max-w-7xl m-auto">
        <x-navigation />
        <section class="py-8 border-gray-700 border-y-2 relative">
            <div class="flex justify-between">
                <article>
                    <h1 class="text-3xl font-bold">
                        The projects I've worked on
                    </h1>
                    <p class="text-gray-400 max-w-lg pt-4 pb-8">
                        This is where you'll find all the projects I'm working
                        on. I have split them up into groups to make it easy to
                        navigate.
                    </p>
                </article>
                <article class="flex items-start gap-4">
                    <div class="tooltip" data-tip="Github Profile">
                        <a href="https://github.com/hakylepremier" target="_blank" rel="noopener noreferrer"><i
                                class="text-[32px] hover:text-[36px] fa-brands fa-github transition-all"></i></a>
                    </div>
                    <div class="tooltip" data-tip="Frontend Mentor Profile">
                        <a href="https://www.frontendmentor.io/profile/hakylepremier" target="_blank"
                            rel="noopener noreferrer"><img src="{{ Vite::asset('resources/images/fm-logo.jpeg') }}"
                                alt="frontend mentor logo"
                                class="w-8 h-8 rounded-full hover:scale-110 transition-all" /></a>
                    </div>
                </article>
            </div>
            <div class="flex justify-between items-center">
                <div class="bg-red-700 px-4 py-2 rounded-3xl">
                    <input type="text"
                        class="bg-transparent p-0 border-none placeholder:text-gray-200 active:bg-transparent"
                        placeholder="Search" />
                </div>
                <div class="flex gap-8">
                    <a href="" class="px-4 py-2 rounded-3xl hover:bg-red-900 transition-colors">All</a>
                    <a href=""
                        class="bg-red-500 px-4 py-2 rounded-3xl hover:bg-red-900 transition-colors">FullStack</a>
                    <a href="" class="px-4 py-2 rounded-3xl hover:bg-red-900 transition-colors">Frontend</a>
                    <a href="" class="px-4 py-2 rounded-3xl hover:bg-red-900 transition-colors">Backend</a>
                    <a href="" class="px-4 py-2 rounded-3xl hover:bg-red-900 transition-colors">Fullstack and
                        Mobile</a>
                </div>
            </div>
            <p
                class="absolute bottom-0 left-1/2 translate-y-1/2 -translate-x-1/2 px-4 text-xl text-gray-600 font-bold bg-[#1d232a]">
                Projects
            </p>
        </section>
    </header>
    <main class="max-w-7xl m-auto py-8">
        <section class="grid grid-cols-2 gap-8 pt-8 ">
            @foreach ($projects as $project)
                <article class="grow relative">
                    <div class="flex justify-between pb-4">
                        <a href="{{ route('projects.show', ['project' => $project]) }}">
                            <h2 class="card-title items-start max-w-xs">{{ $project->title }}</h2>
                        </a>
                        <div class="flex flex-col items-end gap-2">
                            @if ($project->released)
                                <p>Released</p>
                            @else
                                <p>In development</p>
                            @endif
                            <a href=""
                                class="px-2 py-1 rounded-badge  bg-red-800 hover:bg-red-600 transition-colors">FullStack</a>
                        </div>
                    </div>
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <figure class="rounded relative">
                            <img src="{{ Vite::asset('resources/images/bubble-mockup.png') }}" alt=""
                                class="w-full rounded-xl" />
                            <!-- <div class="bg-gray-600 w-xl h-full">375×667</div> -->
                            @if ($loop->odd)
                                <div
                                    class="h-3/4 w-[1px] rounded bg-gray-600 absolute top-1/2 -right-4  -translate-y-1/2 translate-x-1/2 ">
                                </div>
                            @endif
                        </figure>
                    </a>
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <p class="pt-4">{{ $project->summary }}</p>
                    </a>
                    <div
                        class="h-[1px] w-3/4 rounded bg-gray-600 absolute -bottom-4 left-1/2  -translate-x-1/2 translate-y-1/2">
                    </div>
                </article>
            @endforeach
        </section>
    </main>
    <footer class="py-12 bg-gray-950">
        <div class="max-w-5xl m-auto">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
</x-guest-layout>
