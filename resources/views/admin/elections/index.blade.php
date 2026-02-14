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
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
                <div>
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Institutional
                        Governance</span>
                    <h2 class="text-2xl font-black text-charcoal tracking-tight">
                        {{ __('Electoral Registry') }}
                    </h2>
                </div>
            </div>

            <a href="{{ route('admin.elections.create') }}"
                class="btn-institutional px-8 py-3 bg-iuea-red text-white hover:bg-iuea-red-light">
                Initialize New Election
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            @if(session('success'))
                <div
                    class="mb-8 p-4 bg-green-50 border border-green-100 rounded-xl flex items-center text-green-700 text-xs font-bold uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="premium-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th
                                    class="px-8 py-5 text-left text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em]">
                                    Election Series</th>
                                <th
                                    class="px-8 py-5 text-left text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em]">
                                    Category</th>
                                <th
                                    class="px-8 py-5 text-left text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em]">
                                    Operational Schedule</th>
                                <th
                                    class="px-8 py-5 text-left text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em]">
                                    Status</th>
                                <th
                                    class="px-8 py-5 text-right text-[0.6rem] font-black text-gray-400 uppercase tracking-[0.2em]">
                                    Governance Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($elections as $election)
                                <tr class="group hover:bg-gray-50/30 transition-colors">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-base font-black text-charcoal group-hover:text-iuea-red transition-colors">{{ $election->title }}</span>
                                            <span
                                                class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest">ID:
                                                #{{ str_pad($election->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">
                                            {{ str_replace('_', ' ', $election->category) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex flex-col space-y-1">
                                            <div
                                                class="flex items-center text-[0.65rem] font-bold text-gray-500 uppercase tracking-tighter">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-400 mr-2"></span>
                                                OPEN: {{ $election->start_time->format('M d, H:i') }}
                                            </div>
                                            <div
                                                class="flex items-center text-[0.65rem] font-bold text-gray-500 uppercase tracking-tighter">
                                                <span class="w-1.5 h-1.5 rounded-full bg-iuea-red mr-2"></span>
                                                CLOSE: {{ $election->end_time->format('M d, H:i') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'active' => 'bg-green-100 text-green-700',
                                                'draft' => 'bg-yellow-100 text-yellow-700',
                                                'closed' => 'bg-gray-100 text-gray-700',
                                            ];
                                            $colorClass = $statusColors[$election->status] ?? 'bg-gray-100 text-gray-700';
                                        @endphp
                                        <span
                                            class="px-3 py-1 text-[0.6rem] font-black uppercase tracking-widest rounded-full {{ $colorClass }}">
                                            {{ $election->status }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-8 py-6 whitespace-nowrap text-right text-xs font-black uppercase tracking-widest space-x-6">
                                        <a href="{{ route('admin.results.show', $election) }}"
                                            class="text-green-600 hover:text-green-800 transition">Analytics</a>
                                        <a href="{{ route('admin.elections.show', $election) }}"
                                            class="text-charcoal hover:text-iuea-red transition">Configure</a>
                                        <form action="{{ route('admin.elections.destroy', $election) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition"
                                                onclick="return confirm('Authorized Removal: Confirm deletion of election series?')">Archive</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-24 text-center">
                                        <div
                                            class="w-16 h-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200 flex items-center justify-center mx-auto mb-6">
                                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.2em]">No
                                            Election Records Initialized</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>