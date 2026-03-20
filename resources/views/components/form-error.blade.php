@props(['name'])

@error($name)
    <p {{ $attributes->merge(['class'=>"text-xs text-red-500 text-semibold mt-1"]) }}>{{ $message }}</p>
@enderror
