<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot ?? $text }}
</button>
