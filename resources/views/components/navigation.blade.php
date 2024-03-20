<nav class="flex justify-between w-full py-8" x-data="{ open: false, toggle() { this.open = !this.open; } }">
    <a href="{{ route('home') }}">
        <img src="{{ Vite::asset('resources/images/LOGO.svg') }}" alt="My logo" class="w-8 h-8">
    </a>
    <div @click.outside="open = false" data-theme="mytheme" class="bg-inherit">
        <div @click="toggle"
            class="block px-3 py-1 dark:text-white text-gray-500 rounded cursor-pointer hover:dark:bg-[#15191e] hover:dark:text-accent sm:hidden">
            <i class="fa-solid fa-bars text-inherit"></i>
        </div>

        <ul class="fixed top-0 z-10 flex flex-col w-56 h-screen gap-0 pt-2 transition-all bg-white dark:bg-[#1d232a] border-l divide-y divide-gray-200 dark:divide-gray-700 sm:divide-y-0 sm:gap-4 shrink-1 sm:static sm:h-auto sm:flex-row sm:w-auto sm:pt-0 shrink basis-72 sm:border-l-0 border-l-gray-200 dark:border-l-gray-900 sm:z-auto"
            x-bind:class="!open ? '-right-56' : 'right-0'" x-cloak>
            <li class="flex justify-end px-4 sm:hidden">
                <div @click="toggle"
                    class="p-2 px-4 dark:text-white text-gray-500 rounded cursor-pointer hover:dark:bg-[#15191e] hover:dark:text-accent ">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </li>
            <li @click="open = false"><a
                    class="block p-4 sm:hover:dark:text-white sm:hover:text-primary transition-colors hover:sm:bg-inherit hover:dark:bg-[#15191e] hover:bg-gray-100 sm:p-0"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li @click="open = false"><a
                    class="block p-4 sm:hover:dark:text-white sm:hover:text-primary transition-colors hover:sm:bg-inherit hover:dark:bg-[#15191e] hover:bg-gray-100 sm:p-0"
                    href="{{ route('projects.index') }}">Projects</a>
            </li>
            <li @click="open = false"><a
                    class="block p-4 sm:hover:dark:text-white sm:hover:text-primary transition-colors hover:sm:bg-inherit hover:dark:bg-[#15191e] hover:bg-gray-100 sm:p-0 grow"
                    href="{{ route('home') }}#about">About</a></li>
            <li @click="open = false"><a
                    class="block p-4 sm:hover:dark:text-white sm:hover:text-primary transition-colors hover:sm:bg-inherit hover:dark:bg-[#15191e] hover:bg-gray-100 sm:p-0 grow"
                    href="#contact">Contact </a>
            </li>
        </ul>
    </div>
</nav>
