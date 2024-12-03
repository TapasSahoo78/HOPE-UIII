<form data-action="{{ $action }}" method="{{ $method }}"
    {{ $attributes->merge(['class' => 'adminFrm md-float-material form-material']) }}>
    {{ $slot }}
</form>
