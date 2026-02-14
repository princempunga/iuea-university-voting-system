<x-app-layout>
    <x-slot name="header">
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="group inline-flex items-center text-[0.6rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">
                <svg class="w-3 h-3 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Command Center
            </a>
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <div class="h-1 w-8 bg-iuea-red rounded-full"></div>
                    <span class="text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.3em]">Institutional Integrity</span>
                </div>
                <h2 class="text-4xl font-black text-charcoal tracking-tightest">Security <span class="text-iuea-red">Ledger</span></h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex flex-col text-right">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Ledger Status</span>
                    <span class="text-xs font-black text-green-600 uppercase tracking-tighter italic flex items-center">
                        <span class="w-1 h-1 rounded-full bg-green-500 mr-1.5 animate-pulse"></span>
                        Synchronized & Immutable
                    </span>
                </div>
                <button class="bg-iuea-red text-white px-6 py-3 rounded-xl text-[0.65rem] font-black uppercase tracking-widest hover:bg-iuea-red-light transition-all shadow-lg active:scale-95">
                    Generate Report
                </button>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
        <!-- System Health Sensors -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="premium-card p-8 group hover:border-iuea-red/30 transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center border border-gray-100 group-hover:bg-iuea-red group-hover:text-white transition-colors text-charcoal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <span class="text-[0.55rem] font-black text-gray-300 uppercase tracking-widest">Module: CRYPT-V3</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Active Keys</span>
                    <span class="text-2xl font-black text-charcoal tracking-tighter">4,096 bit RSA-PSS</span>
                </div>
            </div>

            <div class="premium-card p-8 group hover:border-iuea-red/30 transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center border border-gray-100 group-hover:bg-iuea-red group-hover:text-white transition-colors text-iuea-red">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="text-[0.55rem] font-black text-gray-300 uppercase tracking-widest">Protocol: SHIELD-X</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Guard Status</span>
                    <span class="text-2xl font-black text-charcoal tracking-tighter italic">Fully Hardened</span>
                </div>
            </div>

            <div class="premium-card p-8 group hover:border-iuea-red/30 transition-all duration-300">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center border border-gray-100 group-hover:bg-iuea-red group-hover:text-white transition-colors text-charcoal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-[0.55rem] font-black text-gray-300 uppercase tracking-widest">Frequency: REAL-TIME</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Audit Interval</span>
                    <span class="text-2xl font-black text-charcoal tracking-tighter italic text-green-600">Continuous Flux</span>
                </div>
            </div>
        </div>

        <!-- Ledger Registry -->
        <div class="premium-card overflow-hidden">
            <div class="p-8 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <div class="flex flex-col">
                    <h4 class="text-sm font-black text-charcoal uppercase tracking-widest">Event Identity Registry</h4>
                    <p class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-[0.2em] mt-1">Cross-Referenceable Audit Chain</p>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="text" placeholder="Search Fingerprint..." class="bg-white border-gray-200 rounded-lg text-[0.6rem] py-2 px-4 focus:ring-iuea-red focus:border-iuea-red w-64 placeholder:tracking-widest placeholder:uppercase">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-5 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em]">Operational Event</th>
                            <th class="px-8 py-5 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em]">Severity</th>
                            <th class="px-8 py-5 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em]">Authenticated Origin</th>
                            <th class="px-8 py-5 text-[0.6rem] font-black text-gray-500 uppercase tracking-[0.2em] text-right">Synchronization</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($logs as $log)
                            <tr class="group hover:bg-gray-50 transition-all duration-200">
                                <td class="px-8 py-7">
                                    <div class="flex items-start space-x-4">
                                        <div @class([
                                            'w-2 h-2 rounded-full mt-1.5',
                                            'bg-red-500' => $log->severity === 'critical',
                                            'bg-orange-500' => $log->severity === 'warning',
                                            'bg-green-500' => $log->severity === 'success',
                                            'bg-blue-500' => $log->severity === 'info',
                                        ])></div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-charcoal group-hover:text-iuea-red transition-colors">{{ $log->event }}</span>
                                            <span class="text-[0.65rem] font-medium text-gray-400 mt-1 max-w-sm leading-relaxed italic">{{ $log->details }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-7">
                                    <span @class([
                                        'inline-flex items-center px-2 py-0.5 rounded text-[0.5rem] font-black uppercase tracking-[0.2em] border',
                                        'bg-red-50 text-red-700 border-red-100 shadow-sm' => $log->severity === 'critical',
                                        'bg-orange-50 text-orange-700 border-orange-100' => $log->severity === 'warning',
                                        'bg-green-50 text-green-700 border-green-100' => $log->severity === 'success',
                                        'bg-blue-50 text-blue-700 border-blue-100' => $log->severity === 'info',
                                    ])>
                                        {{ $log->severity }}
                                    </span>
                                </td>
                                <td class="px-8 py-7">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-lg bg-iuea-red text-white flex items-center justify-center text-[0.55rem] font-black uppercase shadow-inner border border-white/5">
                                            {{ substr($log->user, 0, 1) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest">{{ $log->user }}</span>
                                            <span class="text-[0.55rem] font-bold text-gray-400 italic tracking-tighter">{{ $log->ip }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-7 text-right">
                                    <div class="flex flex-col text-right">
                                        <span class="text-[0.65rem] font-black text-gray-400 font-mono italic">{{ $log->timestamp }}</span>
                                        <span class="text-[0.45rem] font-black text-green-600 uppercase tracking-widest mt-1">CROSS-REF VERIFIED</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-8 bg-iuea-red/5 text-center border-t border-gray-100 flex items-center justify-center space-x-3">
                <div class="h-px w-12 bg-gray-200"></div>
                <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-[0.4em]">End of Cryptographic Log Chain</span>
                <div class="h-px w-12 bg-gray-200"></div>
            </div>
        </div>
    </div>
</x-app-layout>