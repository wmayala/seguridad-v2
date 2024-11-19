<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#111e60] border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-[#111e60] hover:opacity-75 focus:bg-[#111e60]-300 active:bg-[#111e60] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
