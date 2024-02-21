<?php

use App\Models\Project;
use function Livewire\Volt\{state, computed, mount, on};

// $getProjects = fn() => ($this->projects = Project::latest()->get());

// initialises search state and let's it mutate the url param with ?s=, when the search state changes
// search is changed using an input in the component
state(['search' => ''])->url(as: 's', history: true);

// whenever the search value changes this runs and changes the shown projects based on the value
$projects = computed(function () {
    return Project::where('title', 'like', '%' . $this->search . '%')
        ->orWhere('summary', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->latest()
        ->get();
});

// on mount all the projects will be shown unless the search state already has a value, eg: ?s=test.
// this allows for urls to filer projects based on what has been passed to the 's' param
mount(function () {
    $this->projects = $this->search == '' ? Project::latest()->get() : $this->projects;
});

?>

<div>
    <header class="m-auto max-w-7xl">
        <x-navigation />
        <section class="relative py-8 border-gray-700 border-y-2">
            <div class="flex justify-between">
                <article>
                    <h1 class="text-3xl font-bold">
                        The projects I've worked on
                    </h1>
                    <p class="max-w-lg pt-4 pb-8 text-gray-400">
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
                                class="w-8 h-8 transition-all rounded-full hover:scale-110" /></a>
                    </div>
                </article>
            </div>
            <div class="flex items-center justify-between">
                <div class="px-4 py-2 bg-red-700 rounded-3xl">
                    <input type="text" wire:model.live="search"
                        class="p-0 bg-transparent border-none placeholder:text-gray-200 active:bg-transparent"
                        placeholder="Search" />
                </div>
                <div class="flex gap-8">
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">All</a>
                    <a href=""
                        class="px-4 py-2 transition-colors bg-red-500 rounded-3xl hover:bg-red-900">FullStack</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Frontend</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Backend</a>
                    <a href="" class="px-4 py-2 transition-colors rounded-3xl hover:bg-red-900">Fullstack and
                        Mobile</a>
                </div>
            </div>
            <p
                class="absolute bottom-0 left-1/2 translate-y-1/2 -translate-x-1/2 px-4 text-xl text-gray-600 font-bold bg-[#1d232a]">
                Projects
            </p>
        </section>
    </header>
    <main class="py-8 m-auto max-w-7xl">
        <section class="grid grid-cols-2 gap-8 pt-8 ">
            @forelse ($this->projects as $project)
                <article class="relative grow">
                    <div class="flex justify-between pb-4">
                        <a href="{{ route('projects.show', ['project' => $project]) }}">
                            <h2 class="items-start max-w-xs card-title">{{ $project->title }}</h2>
                        </a>
                        <div class="flex flex-col items-end gap-2">
                            <p>{{ $project->stage->name }}</p>
                            <a href=""
                                class="px-2 py-1 transition-colors bg-red-800 rounded-badge hover:bg-red-600">{{ $project->type->title }}</a>
                        </div>
                    </div>
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <figure class="relative rounded">
                            <img src="{{ Vite::asset('resources/images/bubble-mockup.png') }}" alt=""
                                class="w-full rounded-xl" />
                            <!-- <div class="h-full bg-gray-600 w-xl">375×667</div> -->
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
            @empty
                <h2 class="col-span-2 text-center">No projects</h2>
            @endforelse
        </section>
    </main>
</div>
