<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-institutional w-full']) }}>
    {{ $slot }}
</button>