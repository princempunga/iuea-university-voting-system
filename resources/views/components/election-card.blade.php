@props(['election'])

<div {{ $attributes->merge(['class' => 'premium-card group overflow-hidden']) }}>
    <div class="relative h-2 bg-gray-100 overflow-hidden">
        <div class="absolute inset-0 bg-iuea-red transition-transform duration-1000 origin-left"
            style="transform: scaleX({{ $election->status === 'active' ? 1 : 0 }})"></div>
    </div>

    <div class="p-8">
        <div class="flex justify-between items-start mb-6">
            <div class="flex flex-col">
                <span class="text-[0.65rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-1">Election Series
                    2024/25</span>
                <h4
                    class="text-2xl font-extrabold text-charcoal leading-tight group-hover:text-iuea-red transition-colors">
                    {{ $election->title }}
                </h4>
            </div>

            @if($election->status === 'active')
                <div class="flex items-center px-3 py-1 bg-green-50 text-green-600 rounded-full border border-green-100">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-[0.6rem] font-black uppercase tracking-widest">Polling Open</span>
                </div>
            @else
                <div class="flex items-center px-3 py-1 bg-gray-50 text-gray-400 rounded-full border border-gray-100">
                    <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2"></span>
                    <span class="text-[0.6rem] font-black uppercase tracking-widest">{{ ucfirst($election->status) }}</span>
                </div>
            @endif
        </div>

        <p class="text-sm text-gray-500 font-medium mb-8 line-clamp-2 leading-relaxed italic">
            {{ $election->description }}
        </p>

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Closing Date</p>
                <p class="text-[0.65rem] font-extrabold text-charcoal uppercase tabular-nums">
                    {{ $election->end_time->format('M d, H:i') }}
                </p>
            </div>
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 text-center">
                <p class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest mb-1">Participation</p>
                <p class="text-[0.65rem] font-extrabold text-charcoal uppercase tabular-nums">
                    {{ number_format($election->votes_count ?? 0) }} Casts
                </p>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex -space-x-2 overflow-hidden">
                <!-- Candidate mockup icons -->
                <div class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-gray-200"></div>
                <div class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-gray-300"></div>
                <div class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-gray-400"></div>
                <div
                    class="flex items-center justify-center h-8 w-8 rounded-full ring-2 ring-white bg-gray-100 text-[0.6rem] font-black text-gray-400">
                    +12</div>
            </div>

            <a href="{{ route('elections.show', $election) }}"
                class="inline-flex items-center text-xs font-black text-iuea-red uppercase tracking-widest hover:translate-x-1 transition-transform">
                Enter Portal
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>