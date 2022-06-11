<button
    type="button"
    {{ $attributes->merge(['class' => 'transition ease-in-out duration-200'])}}
    >
    {{ $slot }}
</button>