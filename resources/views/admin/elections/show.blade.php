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
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
                <div>
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Institutional
                        Governance</span>
                    <h2 class="text-2xl font-black text-charcoal tracking-tight">
                        {{ $election->title }}
                    </h2>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.results.show', $election) }}"
                    class="btn-institutional px-6 py-2 text-xs bg-green-600 hover:bg-green-700 shadow-sm">
                    Strategic Results
                </a>
                <a href="{{ route('admin.elections.edit', $election) }}"
                    class="btn-institutional px-6 py-2 text-xs bg-white text-charcoal border border-gray-100 font-extrabold shadow-sm hover:border-iuea-red/30 transition-all">
                    Modify Records
                </a>
                <a href="{{ route('admin.elections.index') }}"
                    class="btn-institutional px-6 py-2 text-xs bg-white text-charcoal border border-gray-100 font-black shadow-sm hover:translate-x-0 active:scale-95">
                    Return to Registry
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <!-- Election Strategic Metric Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="premium-card p-6 bg-gray-50/50 border-gray-100">
                    <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Status Code</p>
                    <p class="text-xl font-black text-charcoal uppercase tracking-tighter">{{ $election->status }}</p>
                </div>
                <div class="premium-card p-6 bg-gray-50/50 border-gray-100">
                    <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Category</p>
                    <p class="text-sm font-black text-charcoal uppercase tracking-tighter">
                        {{ str_replace('_', ' ', $election->category) }}
                    </p>
                </div>
                <div class="premium-card p-6 bg-gray-50/50 border-gray-100">
                    <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">System Pulse</p>
                    <div class="flex items-center">
                        <span
                            class="w-2 h-2 mr-2 rounded-full {{ $election->is_active ? 'bg-green-500 animate-pulse' : 'bg-gray-300' }}"></span>
                        <p class="text-lg font-black text-charcoal truncate">
                            {{ $election->is_active ? 'Operational' : 'Inactive' }}
                        </p>
                    </div>
                </div>
                <div class="premium-card p-6 bg-gray-50/50 border-gray-100">
                    <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Opening Epoch</p>
                    <p class="text-sm font-extrabold text-charcoal">{{ $election->start_time->format('M d, H:i') }}</p>
                </div>
                <div class="premium-card p-6 bg-gray-50/50 border-gray-100">
                    <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Closing Epoch</p>
                    <p class="text-sm font-extrabold text-charcoal">{{ $election->end_time->format('M d, H:i') }}</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Election Content -->
                <div class="lg:col-span-2 space-y-12">
                    <div class="premium-card p-10">
                        <h3 class="text-xl font-extrabold text-charcoal mb-6">Strategic Institutional Mission</h3>
                        <p class="text-sm text-gray-500 leading-relaxed font-semibold italic">
                            {{ $election->description ?? 'No strategic mission defined for this election record.' }}
                        </p>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-2xl font-black text-charcoal tracking-tight">Verified Candidates</h3>
                            <a href="{{ route('admin.candidates.create', ['election_id' => $election->id]) }}"
                                class="text-xs font-black text-iuea-red uppercase tracking-widest hover:underline">+
                                Authorize New Candidate</a>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            @forelse($election->candidates as $candidate)
                                <div
                                    class="premium-card p-6 flex items-center space-x-6 group hover:border-iuea-red/20 transition-all">
                                    <div
                                        class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 shadow-sm border border-gray-100">
                                        @if($candidate->photo_url)
                                            <img src="{{ $candidate->photo_url }}" alt="{{ $candidate->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-200">
                                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-black text-charcoal group-hover:text-iuea-red transition-colors">
                                            {{ $candidate->name }}
                                        </h4>
                                        <p class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest">Profile
                                            #{{ str_pad($candidate->id, 4, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.candidates.edit', $candidate) }}"
                                            class="text-[0.6rem] font-black text-charcoal hover:text-iuea-red uppercase tracking-widest text-right">Edit</a>
                                        <form action="{{ route('admin.candidates.destroy', $candidate) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-[0.6rem] font-black text-red-600 hover:text-red-800 uppercase tracking-widest text-right"
                                                onclick="return confirm('Authorized Removal: Confirm deletion of candidate record?')">Audit/Remove</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-2 premium-card p-12 text-center bg-gray-50 border-dashed border-2">
                                    <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">No Candidate
                                        Records Available</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Side Strategic Panel -->
                <div class="lg:col-span-1 space-y-8">
                    <div class="premium-card p-8 bg-white border border-gray-100 relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-xs font-black uppercase tracking-[0.2em] mb-4 text-iuea-red">Integrity
                                Seal</h4>
                            <p class="text-[0.65rem] text-gray-400 font-bold leading-relaxed mb-6"> This election is
                                protected by the IUEA Secure Core. All changes to the electoral configuration are logged
                                and attributed to the current administrative session.</p>
                            <div class="pt-6 border-t border-gray-50">
                                <span
                                    class="text-[0.6rem] font-black text-charcoal uppercase tracking-widest flex items-center">
                                    <svg class="w-3 h-3 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Session Secured
                                </span>
                            </div>
                        </div>
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-iuea-red/5 blur-2xl rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>