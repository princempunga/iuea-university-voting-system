<x-app-layout>
    <x-slot name="header">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}"
                class="group inline-flex items-center text-[0.6rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">
                <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Command Center
            </a>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <div class="h-1 w-8 bg-iuea-red rounded-full"></div>
                    <span class="text-[0.6rem] font-black text-iuea-red uppercase tracking-[0.3em]">Operational
                        Intelligence</span>
                </div>
                <h2 class="text-4xl font-black text-charcoal tracking-tightest">Audit <span
                        class="text-iuea-red">Analytics</span></h2>
            </div>
            <div
                class="flex items-center space-x-4 bg-white/50 backdrop-blur-sm p-3 rounded-2xl border border-white/20 shadow-sm">
                <div class="flex flex-col text-right">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Global Integrity
                        Index</span>
                    <span class="text-xs font-black text-charcoal tracking-tighter">99.98% Cryptographic Match</span>
                </div>
                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center border border-green-100">
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-ping"></div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
        <!-- Strategic Metric Ribbon -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="premium-card p-8 group hover:border-iuea-red-light/30 transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center border border-gray-100 group-hover:bg-charcoal group-hover:text-white transition-colors text-charcoal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-[0.55rem] font-black text-gray-300 uppercase tracking-widest">Registry Sync:
                        Active</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Population
                        Registry</span>
                    <div class="flex items-baseline space-x-2">
                        <span
                            class="text-4xl font-black text-charcoal tracking-tighter">{{ number_format($totalUsers) }}</span>
                        <span class="text-[0.6rem] font-black text-iuea-red uppercase tracking-widest">Enrolled</span>
                    </div>
                </div>
            </div>

            <div class="premium-card p-8 border-b-4 border-b-iuea-red">
                <span
                    class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4 block">Cryptographic
                    Tokens</span>
                <div class="flex items-baseline space-x-2">
                    <span
                        class="text-4xl font-black text-charcoal tracking-tighter">{{ number_format($totalVotes) }}</span>
                    <div
                        class="flex items-center text-green-500 px-1.5 py-0.5 bg-green-50 rounded text-[0.5rem] font-black">
                        <svg class="w-2 h-2 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd"></path>
                        </svg>
                        SECURE
                    </div>
                </div>
                <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-4">Verified Casts In Mainframe</p>
            </div>

            <div class="premium-card p-8 bg-gray-50/50">
                <span
                    class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4 block">Participation
                    Yield</span>
                <div class="flex items-center space-x-4">
                    <span class="text-4xl font-black text-charcoal tracking-tighter">{{ $turnoutPercentage }}%</span>
                    <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-iuea-red rounded-full" style="width: {{ $turnoutPercentage }}%"></div>
                    </div>
                </div>
                <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-4">Total Real-Time Turnout</p>
            </div>

            <div class="premium-card p-8 bg-white border border-dashed border-gray-200">
                <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-4 block">Competitor
                    Grid</span>
                <div class="flex items-baseline space-x-2">
                    <span class="text-4xl font-black text-charcoal tracking-tighter">{{ $totalCandidates }}</span>
                    <span class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest">Profiles</span>
                </div>
                <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-4">Authorized Verification Success</p>
            </div>
        </div>

        <!-- Analytical Hub -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Framework Distribution -->
            <div class="lg:col-span-8 flex flex-col space-y-8">
                <div class="premium-card p-10 flex-1">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                        <div>
                            <h4 class="text-xl font-black text-charcoal tracking-tight">Electoral Framework Distribution
                            </h4>
                            <p class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest mt-1">Categorical
                                Breakdown across system registries</p>
                        </div>
                        <div
                            class="flex items-center space-x-2 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">
                            <span class="text-[0.55rem] font-black text-gray-500 uppercase tracking-widest">Filter:
                                Global View</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($electionsByCategory as $cat)
                            <div
                                class="p-6 rounded-2xl bg-gray-50 border border-gray-100 group hover:border-iuea-red/30 transition-all duration-300">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Framework
                                            Class</span>
                                        <span
                                            class="text-sm font-black text-charcoal uppercase tracking-tighter">{{ str_replace('_', ' ', $cat->category) }}</span>
                                    </div>
                                    <span
                                        class="text-2xl font-black text-gray-300 group-hover:text-iuea-red transition-colors">{{ $cat->count }}</span>
                                </div>
                                <div class="h-1.5 w-full bg-white rounded-full overflow-hidden border border-gray-100">
                                    <div class="h-full bg-charcoal rounded-full group-hover:bg-iuea-red transition-all duration-500"
                                        style="width: {{ ($cat->count / max($totalElections, 1)) * 100 }}%"></div>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Registry
                                        Integrity: 100%</span>
                                    <span
                                        class="text-[0.55rem] font-black text-gray-500">{{ round(($cat->count / max($totalElections, 1)) * 100, 1) }}%
                                        Weight</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Voter Velocity -->
                <div
                    class="premium-card p-10 bg-white border border-gray-100 relative overflow-hidden group hover:shadow-2xl hover:shadow-iuea-red/5 transition-all duration-500">
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-10">
                            <div>
                                <h4 class="text-xl font-black text-charcoal tracking-tightest uppercase italic">Voter
                                    <span class="text-iuea-red">Velocity Flux</span>
                                </h4>
                                <p class="text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em] mt-1">
                                    Live Hourly Participation Waves</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="text-right">
                                    <span
                                        class="text-[0.5rem] font-black text-gray-400 uppercase block tracking-widest">Projected
                                        Peak</span>
                                    <span class="text-xs font-black text-charcoal">14:30 GMT+3</span>
                                </div>
                            </div>
                        </div>

                        <div class="h-40 flex items-end space-x-2 lg:space-x-4">
                            @foreach($velocityData as $data)
                                @php 
                                    $percent = $maxVelocity > 0 ? ($data->count / $maxVelocity) * 100 : 0;
                                    // Ensure a minimum height for visibility if count > 0
                                    if ($data->count > 0 && $percent < 5) $percent = 5;
                                @endphp
                                <div class="flex-1 flex flex-col items-center group/bar">
                                    <div class="w-full bg-gray-50 rounded-t-lg relative transition-all duration-500 group-hover/bar:bg-iuea-red overflow-hidden border border-gray-100/50"
                                        style="height: {{ $percent }}%">
                                        <div
                                            class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-gray-100/30 to-transparent group-hover/bar:from-iuea-red/20">
                                        </div>
                                        <div
                                            class="absolute -top-10 opacity-0 group-hover/bar:opacity-100 transition-all bg-charcoal text-white text-[0.5rem] font-black px-2 py-1 rounded shadow-xl whitespace-nowrap">
                                            {{ $data->count }} Votes
                                        </div>
                                    </div>
                                    <span
                                        class="mt-2 text-[0.45rem] font-black text-gray-400 uppercase tracking-tightest" title="{{ $data->hour }}">{{ $data->label }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-iuea-red/5 blur-[120px] rounded-full"></div>
                </div>
            </div>

            <!-- Insights Sidebar -->
            <div class="lg:col-span-4 flex flex-col space-y-8">
                <div class="premium-card p-8 bg-gray-50 border border-gray-100 flex-1">
                    <h4
                        class="text-[0.6rem] font-black text-charcoal uppercase tracking-[0.25em] mb-8 flex items-center">
                        <svg class="w-3 h-3 mr-2 text-iuea-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Electoral Directives
                    </h4>

                    <div class="space-y-6">
                        <div
                            class="p-5 rounded-2xl bg-white border border-gray-100 shadow-sm relative overflow-hidden group">
                            <div class="absolute left-0 top-0 h-full w-1 bg-green-500"></div>
                            <h5 class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest mb-1.5">
                                Optimization Alert</h5>
                            <p class="text-[0.65rem] font-medium text-gray-400 leading-relaxed italic">Main Campus
                                Cluster reports anomalous turnout growth ( +12% YoY ). Recommended: Increase server
                                socket pool.</p>
                        </div>

                        <div
                            class="p-5 rounded-2xl bg-white border border-gray-100 shadow-sm relative overflow-hidden group">
                            <div class="absolute left-0 top-0 h-full w-1 bg-charcoal"></div>
                            <h5 class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest mb-1.5">
                                Cryptographic Status</h5>
                            <p class="text-[0.65rem] font-medium text-gray-400 leading-relaxed italic">All 4,096 tokens
                                cast in the last 60 minutes have been digitally signed and cross-referenced with DB
                                logs.</p>
                        </div>

                        <div
                            class="p-5 rounded-2xl bg-white border border-gray-100 shadow-sm relative overflow-hidden group">
                            <div class="absolute left-0 top-0 h-full w-1 bg-iuea-red"></div>
                            <h5 class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest mb-1.5">System
                                Audit Note</h5>
                            <p class="text-[0.65rem] font-medium text-gray-400 leading-relaxed italic">Next automated
                                full-system integrity audit scheduled for 00:00 GMT+3. All modules operational.</p>
                        </div>
                    </div>
                </div>

                <div
                    class="premium-card p-8 bg-white border border-gray-100 group cursor-pointer relative overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-iuea-red/5">
                    <div class="relative z-10">
                        <h4 class="text-sm font-black text-charcoal uppercase tracking-widest mb-2 italic">Detailed
                            <span class="text-iuea-red">Security Ledger</span>
                        </h4>
                        <p class="text-xs text-gray-500 font-medium mb-6">Review the immutable cryptographic audit trail
                            of every administrative action.</p>
                        <a href="{{ route('admin.intelligence.logs') }}"
                            class="inline-flex items-center text-[0.6rem] font-black uppercase tracking-[0.2em] text-iuea-red group-hover:underline">
                            Open Audit Logs
                            <svg class="w-3 h-3 ml-2 transform group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-iuea-red/5 blur-3xl rounded-full group-hover:bg-iuea-red/10 transition-colors">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>