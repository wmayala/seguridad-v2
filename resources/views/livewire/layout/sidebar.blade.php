<div class="bg-white overflow-hidden shadow-sm">
    <nav class="flex flex-col m-6 h-dvh">
        @auth
        <div class="w-full max-w-lg mx-auto" x-data="{ openSection: null }">
            @foreach ($sections as $index => $section)
                <div class="border-b border-gray-300">
                    <!-- Título de la Sección -->
                    <button @click="openSection = openSection === {{ $index }} ? null : {{ $index }}"
                            class="w-full px-4 py-2 text-left bg-gray-100 hover:bg-gray-200 focus:outline-none">
                        {{ $section['title'] }}
                    </button>

                    <!-- Opciones de la Sección -->
                    <div x-show="openSection === {{ $index }}"
                         class="px-4 py-2 text-gray-700 bg-white"
                         x-transition>
                        <ul class="ml-4">
                            @foreach ($section['options'] as $option)
                                <li class="py-1">
                                    <button class="text-blue-600 hover:underline">
                                        {{ $option }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

















            <div class="px-3 py-2 uppercase font-bold text-lg"> Controles</div>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Personal por actividad
            </a>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Jubilados
            </a>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Beneficiarios
            </a>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Personal S. F.
            </a>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Personal Empresas
            </a>
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white ml-3"
            >
            <i class="fa fa-check" aria-hidden="true"></i>
                Vehículos
            </a>
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
