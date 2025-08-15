@props(['bodyClass'=>'', 'title'=>'', '$footerLinks'=>''])

<x-base-layout :$bodyClass :$title>
    <x-layouts.header/>
    {{ $slot }}
</x-base-layout>
