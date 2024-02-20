<?php

use Illuminate\Support\Str;

use function Laravel\Folio\name;

name('projects.show');

// route('projects.show', ['project' => $project]);

?>
<x-guest-layout>
    <header class="max-w-5xl m-auto">
        <x-navigation />
        <section class="relative py-8 border-gray-700 border-y-2">
            {{-- <div class="flex justify-between"> --}}
            <article class="flex flex-col gap-4">
                <h1 class="text-3xl font-bold">
                    {{ $project->title }}
                </h1>
                <p class="text-gray-400">
                    @if ($project->description)
                        {{ $project->description }}
                    @else
                        {{ $project->summary }}
                    @endif
                </p>
                <div>
                    <h3 class="text-xl font-bold">Category</h3>
                    <p class="text-gray-400">{{ $project->category->title }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Links</h3>
                    <div class="flex gap-2">
                        <p class="text-[#6895D2] font-bold underline underline-offset-2">Github</p>
                        <p class="text-[#6895D2] font-bold underline underline-offset-2">Live Site</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Stack</h3>
                    <div class="flex flex-wrap gap-2 pt-2 basis-full">
                        @if ($project->stack)
                            @foreach ($project->stack as $stack)
                                <a href="">{{ $stack }}</a>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 20; $i++)
                                <a href=""
                                    class="px-2 py-1 text-xs transition-colors bg-red-500 rounded-3xl hover:bg-red-900">FullStack</a>
                            @endfor
                            {{-- <p class="text-gray-400">No types added</p> --}}
                        @endif
                    </div>
                </div>
            </article>
            {{-- </div> --}}

        </section>
    </header>
    <main class="max-w-5xl py-8 m-auto">
        <figure class="relative rounded">
            @if ($project->photo)
                @foreach ($project->photo as $photo)
                    <img src="{{ asset('storage/' . $photo) }}" alt="" class="w-32 h-32 rounded-xl" />
                @endforeach

            @endif
            <!-- <div class="h-full bg-gray-600 w-xl">375×667</div> -->
        </figure>
        <figure class="relative rounded">
            <img src="{{ Vite::asset('resources/images/bubble-mockup.png') }}" alt=""
                class="w-full rounded-xl" />
            <!-- <div class="h-full bg-gray-600 w-xl">375×667</div> -->
        </figure>
        @if ($project->content)
            <div class="py-8 prose-headings:underline prose-headings:pb-3">
                {!! Str::markdown($project->content) !!}
            </div>
        @else
            <p class="py-8 text-gray-400">Information yet to be added</p>
        @endif

    </main>
    <footer class="py-12 bg-gray-950">
        <div class="max-w-5xl m-auto">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
</x-guest-layout>
