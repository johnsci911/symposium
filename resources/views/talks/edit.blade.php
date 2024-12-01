<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Talk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4">
                        <form class="space-y-6" method="post" action="{{ route('talks.update', ['talk' => $talk]) }}">
                            @method('patch')
                            @include('talks.template')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


