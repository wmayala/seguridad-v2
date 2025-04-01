@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#303845] focus:ring-[#303845] rounded-md shadow-sm']) }}>
