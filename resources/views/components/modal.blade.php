@props(['trigger'])
<div
class="fixed inset-0 top-0 flex items-center h-full overflow-y-auto bg-gray-900 bg-opacity-60"
x-show="{{ $trigger }}"
x-on:click.self="{{ $trigger }} = false"
x-on:keydown.escape.window="{{ $trigger }} = false"
x-cloak
>
<div {{ $attributes->merge(["class" =>"p-8 m-auto shadow-2xl rounded-xl"])}}>
    {{ $slot }}
</div>
</div>
