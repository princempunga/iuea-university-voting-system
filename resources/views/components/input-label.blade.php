<label {{ $attributes->merge(['class' => 'block font-extrabold text-[0.65rem] uppercase tracking-[0.2em] text-gray-400 mb-2']) }}>
    {{ $value ?? $slot }}
</label>