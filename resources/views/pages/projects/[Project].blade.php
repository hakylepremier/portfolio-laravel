<?php

use Illuminate\Support\Str;

use function Laravel\Folio\name;

name('projects.show');

// route('projects.show', ['project' => $project]);

?>
<x-guest-layout>
    <header class="max-w-5xl m-auto lg:px-4 md:px-8 px-4">
        <x-navigation />
        <section class="relative py-8 border-gray-200 dark:border-gray-700  border-y-2">
            {{-- <div class="flex justify-between"> --}}
            <article class="flex flex-col gap-4">
                <h1 class="text-3xl font-bold">
                    {{ $project->title }}
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    @if ($project->description)
                        {{ $project->description }}
                    @else
                        {{ $project->summary }}
                    @endif
                </p>
                <div>
                    <h3 class="text-xl font-bold">Category</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $project->category->title }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Links</h3>
                    <div class="flex gap-2">
                        @forelse ($project->links as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                                class="text-[#6895D2] font-bold underline underline-offset-2">
                                @if ($link->title)
                                    {{ $link->title }}
                                @else
                                    {{ $link->link_type->title }}
                                @endif
                            </a>
                        @empty
                            <p class="text-sm font-bold text-gray-400">No links added</p>
                        @endforelse
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold">Stack</h3>
                    <div class="flex flex-wrap gap-2 pt-2 basis-full">
                        @forelse ($project->stacks as $stack)
                            <p href=""
                                class="px-2 py-1 text-xs transition-colors bg-red-500 text-white rounded-3xl">
                                {{ $stack->title }}</p>

                        @empty
                            <p class="text-sm font-bold text-gray-400">No stack added</p>
                        @endforelse
                    </div>
                </div>
            </article>
            {{-- </div> --}}

        </section>
    </header>
    <main class="max-w-5xl m-auto lg:px-4 md:px-8 px-4">
        <div class="border-b-2 sm:py-8 py-4 border-gray-200 dark:border-gray-700">

            <figure class="relative rounded">
                @if ($project->photo)
                    <img src="{{ asset('storage/' . $project->photo[0]) }}" alt=""
                        class="w-full rounded-xl border border-gray-300 dark:border-no" />
                @else
                    <x-not-found-image />
                @endif
            </figure>
            @if ($project->content)
                <div class="pt-8 dark:prose-headings:text-white prose-headings:text-gray-600 dark:text-white prose-li:ml-4 transition-all prose-ol:list-decimal prose-ul:list-disc prose-h1:text-4xl prose-h2:text-3xl prose-h3:text-2xl prose-headings:text-xl  prose-headings:font-bold prose-headings:pt-4 prose-headings:pb-2 prose-p:py-2 prose-a:border-b-2  hover:dark:prose-a:text-white hover:prose-a:font-bold hover:prose-a:border-accent prose-a:border-primary bg-transparent prose-pre:pt-2 prose-code:hljs-dark"
                    data-theme="mytheme">
                    {!! Str::markdown($project->content) !!}
                </div>
            @else
                <p class="pt-8 text-gray-400">Information yet to be added</p>
            @endif
        </div>

    </main>
    <section class="max-w-2xl px-4 py-16 md:pt-16 pt-8 mx-auto" id="contact">
        <div class="flex flex-col sm:gap-6 gap-3 items-center justify-center pb-12">
            <h2 class=" text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                Let's talk</h2>
            <div class="w-8 h-1 rounded bg-primary" data-theme="mytheme"></div>
            <h3 class="max-w-4xl text-center">Feel free to Contact me by submitting the form below and
                I will get back to you as soon as possible</h3>
        </div>
        <livewire:contact-form />
    </section>
    <footer class="py-12 bg-gray-300 dark:bg-gray-950">
        <div class="max-w-5xl m-auto md:px-8">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
</x-guest-layout>
