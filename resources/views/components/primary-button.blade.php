<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#303845] border border-transparent rounded-full font-semibold text-xs text-white text-center uppercase tracking-widest hover:opacity-75 focus:bg-[#303845]-300 active:bg-[#303845] focus:outline-none focus:ring-2 focus:ring-[#303845] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
