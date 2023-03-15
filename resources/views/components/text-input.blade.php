@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-bar-gray text-white border-0 border-b border-gray-300 focus:ring-0 shadow-sm']) !!}>
