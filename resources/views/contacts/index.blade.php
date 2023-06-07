<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('contacts.store') }}">
                @csrf
                <input type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="{{ __('Add a name for your contact') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <input type="text"
                    name="phonenumber"
                    value="{{ old('phonenumber') }}"
                    placeholder="{{ __('Add your contact´s phone number') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />

                <input type="text"
                    name="ContactType"
                    value="{{ old('ContactType') }}"
                    placeholder="{{ __('Add your contact type (Discord, Facebook etc)') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('ContactType')" class="mt-2" />

                <input type="text"
                    name="ContactValue"
                    value="{{ old('ContactValue') }}"
                    placeholder="{{ __('Add your contact value') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('ContactValue')" class="mt-2" />

                <textarea name="description"
                    placeholder="{{ __('Add a description for your contact.') }}"
                    class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

                <x-primary-button class="mt-4">{{ __('Add contact') }}</x-primary-button>
            </form>

            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="pb-4">
                    <form method="GET" action="{{ route('contacts.index') }}">
                        <div class="flex items-center">
                            <label for="search" class="mr-2">Search:</label>
                            <input type="text" name="search" id="search" value="{{ $search }}" class="rounded-md border-gray-300 px-3 py-1 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Search</button>
                        </div>
                    </form>
                </div>

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                @foreach ($contacts as $contact)
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <small class="ml-2 text-sm text-gray-600">Date Added: {{ $contact->created_at->format('j M Y, g:i a') }}</small>
                                    @unless ($contact->created_at->eq($contact->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                                </div>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('contacts.edit', $contact)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>

                                    </x-slot>
                                </x-dropdown>
                            </div>

                            <p class="mt-4 text-lg text-gray-900">Contact's Name: {{ $contact->name }}</p>
                            <p class="mt-4 text-lg text-gray-900">Contact's Phone number: {{ $contact->phonenumber }}</p>
                            <p class="mt-4 text-lg text-gray-900">Contact's Description: {{ $contact->description }}</p>
                            <p class="mt-4 text-lg text-gray-900">Contact's {{ $contact->ContactType }} is {{ $contact->ContactValue }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>