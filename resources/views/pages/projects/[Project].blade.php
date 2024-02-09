<?php

use Illuminate\Support\Str;

use function Laravel\Folio\name;

name('projects.show');

// route('projects.show', ['project' => $project]);

?>
<x-guest-layout>
    <header class="max-w-5xl m-auto">
        <x-navigation />
        <section class="py-8 border-gray-700 border-y-2 relative">
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
                    <h3 class="font-bold text-xl">Type</h3>
                    <p class="text-gray-400">Social Media</p>
                </div>
                <div>
                    <h3 class="font-bold text-xl">Links</h3>
                    <div class="flex gap-2">
                        <p class="text-[#6895D2] font-bold underline underline-offset-2">Github</p>
                        <p class="text-[#6895D2] font-bold underline underline-offset-2">Live Site</p>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-xl">Stack</h3>
                    <div class="flex gap-2 pt-2 basis-full flex-wrap">
                        @if ($project->stack)
                            @foreach ($project->stack as $stack)
                                <a href="">{{ $stack }}</a>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 20; $i++)
                                <a href=""
                                    class="bg-red-500 px-2 py-1 text-xs rounded-3xl hover:bg-red-900 transition-colors">FullStack</a>
                            @endfor
                            {{-- <p class="text-gray-400">No types added</p> --}}
                        @endif
                    </div>
                </div>
            </article>
            {{-- </div> --}}

        </section>
    </header>
    <main class="max-w-5xl m-auto py-8">
        <figure class="rounded relative">
            <img src="{{ Vite::asset('resources/images/bubble-mockup.png') }}" alt=""
                class="w-full rounded-xl" />
            <!-- <div class="bg-gray-600 w-xl h-full">375×667</div> -->
        </figure>
        @if ($project->content)
            <div class="py-8 prose-headings:underline prose-headings:pb-3">
                {!! Str::markdown($project->content) !!}
            </div>
        @else
            <p class="text-gray-400 py-8">Information yet to be added</p>
        @endif

    </main>
    <footer class="py-12 bg-gray-950">
        <div class="max-w-5xl m-auto">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
</x-guest-layout>
