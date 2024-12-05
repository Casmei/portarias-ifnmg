@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-xl font-bold']) }}>
    {{ $value ?? $slot }}
</label>
