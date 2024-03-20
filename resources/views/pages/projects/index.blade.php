<?php

use App\Models\Project;

use function Laravel\Folio\name;

use Illuminate\View\View;

use function Laravel\Folio\render;

name('projects.index');
?>

@php $projects = Project::latest()->get(); @endphp

<x-guest-layout>
    <livewire:projects.index />
    <footer class="py-12 bg-gray-300 dark:bg-gray-950">
        <div class="max-w-5xl m-auto md:px-8">

            <x-footer />
        </div>
        {{-- Photo by Felix Mittermeier: https://www.pexels.com/photo/blue-universe-956981/ --}}
    </footer>
</x-guest-layout>
