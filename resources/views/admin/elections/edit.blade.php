<x-app-layout>
    <x-slot name="header">
        <div class="mb-6">
            <a href="{{ route('admin.elections.index') }}"
                class="group inline-flex items-center text-[0.6rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">
                <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Registry
            </a>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Election') }}: {{ $election->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.elections.update', $election) }}"
                        class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="title" :value="__('Election Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title', $election->title)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Election Category')" />
                            <select id="category" name="category"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="guild_president" {{ old('category', $election->category) == 'guild_president' ? 'selected' : '' }}>Guild President
                                </option>
                                <option value="faculty_representative" {{ old('category', $election->category) == 'faculty_representative' ? 'selected' : '' }}>Faculty
                                    Representative</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                rows="4">{{ old('description', $election->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="start_time" :value="__('Opening Date & Time')" />
                                <x-text-input id="start_time" name="start_time" type="datetime-local"
                                    class="mt-1 block w-full" :value="old('start_time', $election->start_time->format('Y-m-d\TH:i'))" required />
                                <x-input-error class="mt-2" :messages="$errors->get('start_time')" />
                            </div>

                            <div>
                                <x-input-label for="end_time" :value="__('Closing Date & Time')" />
                                <x-text-input id="end_time" name="end_time" type="datetime-local"
                                    class="mt-1 block w-full" :value="old('end_time', $election->end_time->format('Y-m-d\TH:i'))" required />
                                <x-input-error class="mt-2" :messages="$errors->get('end_time')" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="draft" {{ old('status', $election->status) == 'draft' ? 'selected' : '' }}>
                                    Draft</option>
                                <option value="active" {{ old('status', $election->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="archived" {{ old('status', $election->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button
                                style="background-color: #8B0000;">{{ __('Update Election') }}</x-primary-button>
                            <a href="{{ route('admin.elections.index') }}"
                                class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>