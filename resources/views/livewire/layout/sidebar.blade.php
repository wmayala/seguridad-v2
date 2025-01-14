<div class="grid-cols-4 w-1/6 h-dvh">
    <div class="bg-white overflow-hidden shadow-sm">
        <nav class="flex flex-col m-6 h-dvh">
            @auth
                <div class="w-full max-w-lg mx-auto" x-data="{ openSection: null }">
                    @foreach ($sections as $index => $section)
                        <div class="border-b border-gray-300">
                            <!-- Título de la Sección -->
                            <button @click="openSection = openSection === {{ $index }} ? null : {{ $index }}"
                                    class="w-full px-4 py-2 text-left font-bold bg-gray-200 hover:bg-gray-300 focus:outline-none">
                                {{ $section['title'] }}
                            </button>

                            <!-- Opciones de la Sección -->
                            <div x-show="openSection === {{ $index }}"
                                class="px-2 py-2"
                                x-transition>
                                <ul class="ml-1">
                                    @foreach ($section['options'] as $option)
                                        <li class="py-1">
                                            <a href="{{ route($option['route']) }}" class="w-full text-start">
                                                <div class="text-[#111e60] hover:bg-[#111e60] hover:text-white rounded-xl py-1 px-2 mx-2 w-100">{{ $option['label'] }}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    </div>
</div>
