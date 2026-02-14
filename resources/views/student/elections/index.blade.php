<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
            <div>
                <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Institutional
                    Portal</span>
                <h2 class="text-2xl font-black text-charcoal tracking-tight">
                    {{ __('Active Voting Registry') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <!-- Informational Banner -->
            <div
                class="premium-card p-10 bg-white border border-gray-100 relative overflow-hidden group hover:shadow-2xl hover:shadow-iuea-red/5 transition-all duration-500">
                <div class="relative z-10 max-w-2xl">
                    <h3 class="text-3xl font-extrabold mb-4 tracking-tight text-charcoal uppercase italic">
                        Your Vote is Your <span class="text-iuea-red">Voice.</span>
                    </h3>
                    <p class="text-lg text-gray-500 font-medium leading-relaxed">
                        Select an active election series from the registry below. Once you enter a portal, you will be
                        presented with verified candidate profiles and the ability to cast your secure democratic vote.
                    </p>
                </div>
                <!-- Branding Accent -->
                <div
                    class="absolute -bottom-12 -right-12 w-64 h-64 bg-iuea-red/5 blur-3xl rounded-full group-hover:bg-iuea-red/10 transition-colors duration-700">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($elections as $election)
                    <x-election-card :election="$election" />
                @empty
                    <div class="col-span-full premium-card p-24 text-center bg-gray-50/50 border-dashed border-2">
                        <div
                            class="w-20 h-20 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center mx-auto mb-8">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h5 class="text-xl font-black text-gray-400 uppercase tracking-widest">No Active Sessions Found</h5>
                        <p class="text-sm text-gray-300 font-bold mt-2">The electoral registry is currently dormant. Contact
                            the SRC Secretariat for schedule details.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>