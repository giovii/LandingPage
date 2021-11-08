
<div
    class="flex flex-col w-full h-screen bg-indigo-900"
    x-data="{
        showSubscribe: @entangle('showSubscribe'),
        showSuccess: @entangle('showSuccess'),
    }"
    >
    <nav class="container flex justify-between pt-5 mx-auto text-indigo-200">
        <a class="text-4xl font-bold"href="/">
            <x-application-logo class="w-16 h-16 fill-current">
            </x-application-logo>
        </a>
        <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}">
                    login
                </a>
            @endauth
        </div>
    </nav>
    <div class="container flex items-center h-full mx-auto">
        <div class="flex flex-col items-start w-1/3">
            <h1 class="mb-4 text-5xl font-bold leading-tight text-white">
                Simple generic landing page to subscribe
            </h1>
            <p class="mb-10 text-xl text-indigo-200">
                We are just checking the <span class="font-bold ">TALL</span> stack.
            </p>
            <x-button
                class="px-8 py-3 bg-red-500 hover:bg-red-700"
                x-on:click="showSubscribe = true"
            >
                subscribe
            </x-button>
        </div>
    </div>

    <x-modal class="bg-pink-500" trigger="showSubscribe">
        <p class="mb-10 text-5xl font-extrabold text-center text-white">
            Let's do it
        </p>
        <form
        class="flex flex-col items-center p24"
        wire:submit.prevent="subscribe"
        >
            <x-input
                class="px-5 py-3 border border-blue-400 w-80"
                type="email"
                name="email"
                placeholder="example@mail.com"
                wire:model="email"
                wire:model.defer='email'
            ></x-input>
            <span class="mt-1 text-xs text-gray-100">
                {{
                    $errors->has('email')
                    ? $errors->first('email')
                    : "We will send you a confirmation email"

                    }}
            </span>
            <x-button class="justify-center px-5 py-3 mt-5 bg-blue-500 w-80">
                <span class="animate-spin" wire:loading wire:target='subscribe'>
                    &#10061;
                </span>
                <span wire:loading.remove wire.targer='subscribe'>
                    Get in
                </span>
            </x-button>

        </form>
    </x-modal>
    <x-modal class="bg-green-500" trigger="showSuccess">
        <p class="font-extrabold text-center text-white animate-pulse text-9xl">
            &check;
        </p>
        <p class="mt-8 mb-1 text-5xl font-extrabold text-center text-white">
            Great!
        </p>
        <p class="text-3xl text-center text-white">

        @if (request()->has('verified')&& request()->verified == 1)
            Thanks for confirming.
        @else
            See you in your inbox.

        @endif
        </p>

    </x-modal>


</div>
</div>
