<nav class="flex justify-between w-full py-8">
    <a href="{{ route('home') }}">
        <img src="{{ Vite::asset('resources/images/LOGO.svg') }}" alt="My logo" class="w-8 h-8">
    </a>
    <ul class="flex gap-4 shrink-1">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li><a href="{{ route('home') }}#about">About</a></li>
        <li><a href="#contact">Contact </a></li>
    </ul>
</nav>
