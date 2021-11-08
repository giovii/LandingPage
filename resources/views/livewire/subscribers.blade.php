<div
    class="p-6 bg-white border-b border-gray-200"
    x-data="{
        showEdit: @entangle('showEdit'),
    }"
>

<x-modal class="overflow-x-visible bg-indigo-600" trigger="showEdit">

    <p class="mt-8 mb-8 text-5xl font-extrabold text-center text-white">
        Need to modify the mail?
    </p>
    <div class="flex items-center justify-center">
        <x-input
        type="text"
        class="px-5 border border-gray-300 rounded-lg "
        value='{{ $subscriber->email?? "" }}'
        wire:model.defer="changeEmail"


       >
        </x-input>


        <x-button
        class="h-12 px-6 m-2 text-lg text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
        wire:click='applyEdit({{ $subscriber ?? ""}})'
        >
            Apply
        </x-button>
    </div>


</x-modal>
    <p class="mb-6 text-2xl font-bold text-gray-600 underline">
        Subscribers
    </p>

    <div class="px-8">
        <x-input
        type="text"
        class="float-right pl-8 mb-4 border border-gray-300 rounded-lg m-1/3"
        placeholder="Search"
        wire:model="search"
        >
        </x-input>


        @if($subscribers->isEmpty())
        <div class="flex w-full p-5 bg-red-100 rounded-lg">
            <p class="text-red-400">
                No subscribers found.
            </p>

        </div>
        @else
            <table class="w-full">
                <thead class="text-indigo-600 border-b-2 border-gray-300">
                    <tr >
                        <th class="px-6 py-3 text-left">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left">
                            Verified
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber )
                    <tr class="text-sm text-indigo-900 border-b border-gray-400">
                        <td class="px-6 py-4">
                            {{ $subscriber->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ optional($subscriber->email_verified_at)->diffForHumans() ?? "Never"}}
                        </td>
                        <td class="px-6 py-4">
                            <x-button
                            class="text-red-500 border border-red-500 bg-red-50 hover:bg-red-100"
                            wire:click='delete({{ $subscriber->id }})'
                            >
                                Delete
                            </x-button>
                        </td>
                        <td class="px-6 py-4">
                            <x-button

                            class="text-green-500 border border-green-500 bg-green-50 hover:bg-green-100"
                            wire:click='edit({{ $subscriber}})'
                            >
                                Edit
                            </x-button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        @endif



    </div>


</div>
