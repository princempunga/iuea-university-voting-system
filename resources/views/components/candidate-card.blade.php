@props(['candidate', 'voted' => false])

<div {{ $attributes->merge(['class' => 'premium-card group overflow-hidden border-2 ' . ($voted ? 'border-iuea-red' : 'border-gray-100 hover:border-iuea-red/30')]) }}>
    <div class="relative">
        <!-- Photo Placeholder -->
        <div class="aspect-[4/3] bg-gray-100 flex items-center justify-center overflow-hidden">
            @if($candidate->photo_url)
                <img src="{{ $candidate->photo_url }}" alt="{{ $candidate->name }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            @else
                <svg class="w-20 h-20 text-gray-200" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            @endif
        </div>

        @if($voted)
            <div class="absolute top-4 right-4 bg-iuea-red text-white p-2 rounded-full shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        @endif
    </div>

    <div class="p-8">
        <div class="mb-6">
            <h5 class="text-2xl font-black text-charcoal tracking-tight">{{ $candidate->name }}</h5>
            <span class="text-[0.65rem] font-bold uppercase tracking-[0.2em] text-iuea-red">Candidate ID:
                #{{ str_pad($candidate->id, 4, '0', STR_PAD_LEFT) }}</span>
        </div>

        <div class="space-y-4 mb-8">
            <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 font-medium">
                {{ $candidate->bio }}
            </p>
        </div>

        <div class="pt-6 border-t border-gray-100">
            @if(!$voted)
                <button
                    onclick="window.confirmVote({{ $candidate->id }}, '{{ $candidate->name }}', {{ $candidate->election_id }})"
                    class="btn-institutional w-full group-hover:bg-iuea-red-light transition-all flex justify-between items-center group/btn">
                    <span>Cast My Vote</span>
                    <svg class="w-5 h-5 opacity-50 group-hover/btn:opacity-100 group-hover/btn:translate-x-1 transition-all"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
            @else
                <div
                    class="flex items-center justify-center py-3 bg-gray-50 rounded-xl text-gray-400 font-bold text-sm uppercase tracking-widest border border-gray-100">
                    Vote Recorded
                </div>
            @endif
        </div>
    </div>
</div>