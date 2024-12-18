@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-white']) }}>
    {{ $value ?? $slot }}
</label>
