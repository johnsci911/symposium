<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Talks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc pl-4">
                        @foreach ($talks as $talk)
                            <li><a class="font-bold hover:underline" href="{{ route('talks.show', ['talk' => $talk]) }}">{{ $talk->title }}</a> ({{ $talk->type }} \ {{ $talk->length }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

