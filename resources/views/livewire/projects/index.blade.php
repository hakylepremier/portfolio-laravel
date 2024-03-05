<?php

use App\Models\Project;
use Illuminate\Contracts\Database\Eloquent\Builder;

// use Illuminate\Database\Query\Builder;

use function Livewire\Volt\{state, computed, mount, on};

// $getProjects = fn() => ($this->projects = Project::latest()->get());

// initialises search state and let's it mutate the url param with ?s=, when the search state changes
// search is changed using an input in the component
state(['search' => ''])->url(as: 's', history: true);

// whenever the search value changes this runs and changes the shown projects based on the value
$projects = computed(function () {
    return Project::where('published', true)
        ->where(function (Builder $query) {
            $query
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('summary', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        })
        ->orderBy('order', 'desc')
        ->get();
});

// on mount all the projects will be shown unless the search state already has a value, eg: ?s=test.
// this allows for urls to filer projects based on what has been passed to the 's' param
mount(function () {
    $this->projects = $this->search == '' ? Project::where('published', true)->orderBy('order', 'desc')->get() : $this->projects;
});

?>

<div>
    <header class="m-auto max-w-7xl md:px-8 px-4">
        <x-navigation />
        <section class="relative py-8 border-gray-700 border-y-2">
            <div class="flex justify-between md:gap-0 gap-2">
                <article>
                    <h1 class="text-3xl font-bold">
                        The projects I've worked on
                    </h1>
                    <p class="max-w-lg pt-4 lg:pb-8 pb-6 text-gray-400">
                        This is where you'll find all the projects I'm working
                        on. I have split them up into groups to make it easy to
                        navigate.
                    </p>
                </article>
                <article class="flex items-start md:gap-4 gap-2 md:flex-row flex-col">
                    <div class="tooltip" data-tip="Github Profile">
                        <a href="https://github.com/hakylepremier" target="_blank" rel="noopener noreferrer"><i
                                class="text-[32px] hover:text-[36px] fa-brands fa-github transition-all"></i></a>
                    </div>
                    <div class="tooltip" data-tip="Frontend Mentor Profile">
                        <a href="https://www.frontendmentor.io/profile/hakylepremier" target="_blank"
                            rel="noopener noreferrer"><img src="{{ Vite::asset('resources/images/fm-logo.jpeg') }}"
                                alt="frontend mentor logo"
                                class="w-8 h-8 transition-all rounded-full hover:scale-110" /></a>
                    </div>
                </article>
            </div>
            <div class="flex lg:items-center md:items-start lg:flex-row flex-col gap-6 lg:justify-between">
                <div class="px-4 py-2 bg-red-700 rounded-3xl">
                    <input type="text" wire:model.live="search"
                        class="p-0 bg-transparent border-none placeholder:text-gray-200 active:bg-transparent"
                        placeholder="Search" />
                </div>
                {{-- <div class="flex lg:gap-8 gap-2 items-baseline">
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">All</a>
                    <a href=""
                        class="px-4 py-2 transition-colors bg-red-500 rounded-3xl hover:bg-red-900">FullStack</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Frontend</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Backend</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Fullstack and
                        Mobile</a>
                </div> --}}
            </div>
            <p
                class="absolute bottom-0 left-1/2 translate-y-1/2 -translate-x-1/2 px-4 text-xl text-gray-600 font-bold bg-[#1d232a]">
                Projects
            </p>
        </section>
    </header>
    <main class="md:pt-8 p-8 md:px-8 px-4 pt-0 m-auto max-w-7xl">
        <section
            class="md:grid md:grid-cols-2 md:divide-y-0 divide-y divide-gray-600 gap-8 md:pt-8 md:pb-20 border-b-2 border-gray-700">
            @forelse ($this->projects as $project)
                <article class="relative grow md:py-0 py-8">
                    <div class="flex justify-between gap-2 pb-4">
                        <a href="{{ route('projects.show', ['project' => $project]) }}">
                            <h2 class="items-start lg:text-xl text-base lg:max-w-xs max-w-60 card-title">
                                {{ $project->title }}</h2>
                        </a>
                        <div class="flex flex-col items-end justify-end gap-2 flex-shrink">
                            <p class="lg:text-base text-sm flex-shrink">{{ $project->stage->name }}</p>
                            <nav class="flex flex-shrink max-w-64 items-end justify-end flex-row-reverse">
                                <div class="flex flex-wrap gap-2 items-end justify-end">
                                    @forelse ($project->types as $type)
                                        <a href=""
                                            class="px-2 py-1 transition-colors bg-red-800 rounded-badge hover:bg-red-600 lg:text-base text-sm">{{ $type->title }}</a>
                                    @empty
                                        <p class="text-sm font-bold text-gray-600">No type added</p>
                                    @endforelse
                                </div>
                            </nav>
                        </div>
                    </div>
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <figure class="relative rounded">
                            @if ($project->photo)
                                <img src="{{ asset('storage/' . $project->photo[0]) }}" alt=""
                                    class="w-full rounded-xl aspect-[8/5] object-cover" />
                                {{-- <p>{{ $project->photo }}</p> --}}
                            @else
                                {{-- <div class="relative">
                                    <img src="{{ Vite::asset('resources/images/no-project-image.webp') }}"
                                        alt="" class="w-full rounded-xl" />
                                    <p
                                        class="absolute left-0 w-full font-bold text-center text-gray-700 uppercase bottom-8">
                                        Project Image Unavailable
                                    </p>
                                </div> --}}
                                <x-not-found-image-small />
                            @endif
                            <!-- <div class="h-full bg-gray-600 w-xl">375×667</div> -->
                            @if ($loop->odd)
                                <div
                                    class="md:visible invisible h-3/4 w-[1px] rounded bg-gray-600 absolute top-1/2 -right-4  -translate-y-1/2 translate-x-1/2 ">
                                </div>
                            @endif
                        </figure>
                    </a>
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <p class="pt-4 lg:text-base text-sm">{{ $project->summary }}</p>
                    </a>
                    <div
                        class="md:visible invisible h-[1px] w-3/4 rounded bg-gray-600 absolute -bottom-4 left-1/2  -translate-x-1/2 translate-y-1/2">
                    </div>
                </article>
            @empty
                <h2 class="col-span-2 text-center">No projects</h2>
            @endforelse
        </section>
        <section class="max-w-2xl px-2 md:pt-16 pt-8 py-16 md:px-8  mx-auto" id="contact">
            <div class="flex flex-col sm:gap-6 gap-3 items-center justify-center pb-12">
                <h2
                    class=" text-3xl font-bold text-center uppercase after:w-7 after:h-2 after:bg-slate-300 after:contents">
                    Let's talk</h2>
                <div class="w-8 h-1 rounded bg-primary" data-theme="mytheme"></div>
                <h3 class="max-w-4xl text-center">Feel free to Contact me by submitting the form below and
                    I will get back to you as soon as possible</h3>
            </div>
            <livewire:contact-form />
        </section>
    </main>
</div>
