<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
                <div>
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Digital Voting
                        Booth</span>
                    <h2 class="text-2xl font-black text-charcoal tracking-tight">
                        {{ $election->title }}
                    </h2>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <div class="text-right">
                    <p class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest">Time Remaining</p>
                    <p class="text-sm font-black text-charcoal">{{ $election->end_time->diffForHumans(['parts' => 2]) }}
                    </p>
                </div>
                <div class="h-8 w-px bg-gray-200"></div>
                <div class="flex items-center px-4 py-2 bg-green-50 rounded-lg border border-green-100">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 animate-pulse"></span>
                    <span class="text-[0.6rem] font-black text-green-700 uppercase tracking-widest">Secure
                        Connection</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <!-- Integrity Banner -->
            <div class="premium-card bg-iuea-red/5 border-iuea-red/10 p-8 flex items-center">
                <div
                    class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center mr-8 text-iuea-red animate-pulse">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-black text-iuea-red uppercase tracking-[0.2em] mb-1">Democratic Integrity
                        Notice</h4>
                    <p class="text-xs text-gray-400 font-bold leading-relaxed max-w-4xl italic">
                        By proceeding, you agree that your vote is your own individual decision. The system ensures
                        complete anonymity through identity separation. Once a vote is cast, it is permanent and cannot
                        be altered or reviewed.
                    </p>
                </div>
            </div>

            <!-- Election Context -->
            <div class="grid lg:grid-cols-3 gap-12">
                <div class="lg:col-span-1">
                    <div class="sticky top-32 space-y-8">
                        <div>
                            <h3 class="text-xl font-extrabold text-charcoal mb-4">Election Overview</h3>
                            <p class="text-sm text-gray-500 leading-relaxed font-medium">
                                {{ $election->description }}
                            </p>
                        </div>

                        <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100">
                            <h4 class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest mb-4">Voter
                                Eligibility</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center text-xs font-bold text-charcoal">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Authenticated Identity Verified
                                </li>
                                <li class="flex items-center text-xs font-bold text-charcoal">
                                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    One-Vote Status: Eligible
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-black text-charcoal tracking-tight">Select Your Candidate</h3>
                        <span
                            class="text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em]">{{ $election->candidates->count() }}
                            Verified Listings</span>
                    </div>

                    @php
                        $hasVoted = auth()->user()->votedElections()->where('election_id', $election->id)->exists();
                    @endphp

                    <div class="grid md:grid-cols-2 gap-8">
                        @foreach($election->candidates as $candidate)
                            <x-candidate-card :candidate="$candidate" :voted="$hasVoted" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal Component -->
    <x-vote-confirmation-modal />
</x-app-layout>