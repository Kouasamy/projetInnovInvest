@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-xl border-gray-300 focus:outline-none focus:ring-0 rounded-md shadow-sm']) !!}>
