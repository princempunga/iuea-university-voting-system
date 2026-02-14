<x-app-layout>
    <x-slot name="header">
        <div class="mb-6">
            <a href="{{ route('admin.candidates.index') }}" class="group inline-flex items-center text-[0.6rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">
                <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Candidates
            </a>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Candidate') }}: {{ $candidate->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.candidates.update', $candidate) }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="election_id" :value="__('Appoint to Election Series')" />
                            <select id="election_id" name="election_id"
                                class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm text-sm font-bold uppercase tracking-tight"
                                required>
                                @foreach($elections as $election)
                                    <option value="{{ $election->id }}" {{ old('election_id', $candidate->election_id) == $election->id ? 'selected' : '' }}>
                                        {{ $election->title }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('election_id')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Legal Name of Candidate')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $candidate->name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="faculty" :value="__('Institutional Faculty')" />
                                <select id="faculty" name="faculty"
                                    class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm text-sm font-bold uppercase tracking-tight"
                                    required>
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty }}" {{ old('faculty', $candidate->faculty) == $faculty ? 'selected' : '' }}>
                                            {{ $faculty }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('faculty')" />
                            </div>

                            <div>
                                <x-input-label for="candidate_number" :value="__('Official Ballot Number')" />
                                <x-text-input id="candidate_number" name="candidate_number" type="text"
                                    class="mt-1 block w-full" :value="old('candidate_number', $candidate->candidate_number)"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('candidate_number')" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="bio" :value="__('Professional Biography / Manifesto Summary')" />
                            <textarea id="bio" name="bio"
                                class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm text-sm font-medium"
                                rows="4">{{ old('bio', $candidate->bio) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                        </div>

                        <div>
                            <x-input-label for="photo" :value="__('Update Portrait (Image Upload)')" />
                            @if($candidate->photo_url)
                                <div class="mt-2 mb-4">
                                    <p class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-widest mb-2">Current Portrait</p>
                                    <img src="{{ $candidate->photo_url }}" alt="Current Portrait" class="w-24 h-24 object-cover rounded-xl border border-gray-100 shadow-sm">
                                </div>
                            @endif
                            <div class="mt-1 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-red-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="photo" class="relative cursor-pointer bg-white rounded-md font-black text-iuea-red hover:text-red-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                            <span>Upload a new file</span>
                                            <input id="photo" name="photo" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-widest">
                                        PNG, JPG, GIF up to 2MB
                                    </p>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button
                                style="background-color: #8B0000;">{{ __('Update Candidate') }}</x-primary-button>
                            <a href="{{ route('admin.candidates.index') }}"
                                class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>