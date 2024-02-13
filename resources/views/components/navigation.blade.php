<nav class="flex justify-between w-full py-8">
    <a href="{{ route('home') }}">
        <img src="{{ Vite::asset('resources/images/LOGO.svg') }}" alt="My logo" class="h-8 w-8">
    </a>
    <ul class="flex gap-4 shrink-1">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact </a></li>
    </ul>
</nav>
