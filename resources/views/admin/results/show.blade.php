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
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Strategic
                        Overview</span>
                    <h2 class="text-2xl font-black text-charcoal tracking-tight">
                        {{ __('Live Results Monitor') }}: {{ $election->title }}
                    </h2>
                </div>
            </div>

            <div id="connection-status"
                class="flex items-center px-4 py-2 bg-gray-50 border border-gray-100 rounded-full">
                <span class="w-2 h-2 rounded-full bg-yellow-400 mr-3 animate-pulse"></span>
                <span class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">Awaiting Strategic
                    Link...</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <!-- Strategic Metrics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="premium-card p-10 flex flex-col items-center text-center group">
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Total Verified
                        Votes</span>
                    <span id="total-votes"
                        class="text-6xl font-black text-charcoal group-hover:text-iuea-red transition-colors">{{ $totalVotes }}</span>
                </div>
                <div class="premium-card p-10 flex flex-col items-center text-center">
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Polling
                        Status</span>
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                        <span
                            class="text-2xl font-black text-charcoal uppercase tracking-tighter">{{ $election->status }}</span>
                    </div>
                </div>
                <div class="premium-card p-10 flex flex-col items-center text-center">
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Temporal
                        Window</span>
                    <span
                        class="text-2xl font-black text-charcoal tracking-tight">{{ $election->end_time->diffForHumans(['parts' => 1]) }}</span>
                </div>
            </div>

            <div class="premium-card overflow-hidden">
                <div class="p-10 border-b border-gray-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-extrabold text-charcoal">Election Integrity Feed</h3>
                        <p class="text-xs text-gray-400 font-medium">Real-time candidate performance and aggregate data
                            visualization.</p>
                    </div>
                    <div
                        class="flex items-center space-x-2 px-3 py-1 bg-iuea-red/5 rounded-full border border-iuea-red/10">
                        <svg class="w-3 h-3 text-iuea-red" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-[0.6rem] font-black text-iuea-red uppercase tracking-widest">Audit
                            Verified</span>
                    </div>
                </div>

                <div id="results-container" class="p-10 space-y-12">
                    @foreach($election->candidates as $candidate)
                        @php
                            $percentage = $totalVotes > 0 ? round(($candidate->votes_count / $totalVotes) * 100, 1) : 0;
                        @endphp
                        <div class="candidate-row group" data-candidate-id="{{ $candidate->id }}">
                            <div class="flex justify-between items-end mb-4">
                                <div class="flex items-center space-x-6">
                                    <div
                                        class="w-16 h-16 rounded-2xl bg-gray-50 border border-gray-100 overflow-hidden shadow-sm group-hover:scale-110 transition-transform duration-500">
                                        @if($candidate->photo_url)
                                            <img src="{{ $candidate->photo_url }}" alt="{{ $candidate->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-300">
                                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4
                                            class="text-xl font-black text-charcoal group-hover:text-iuea-red transition-colors">
                                            {{ $candidate->name }}
                                        </h4>
                                        <p class="text-[0.65rem] font-bold text-gray-400 uppercase tracking-widest">
                                            Current Support: <span
                                                class="vote-count text-charcoal">{{ $candidate->votes_count }}</span>
                                            Verified Votes
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="text-3xl font-black text-charcoal percentage-label tracking-tighter">{{ $percentage }}%</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-50 rounded-2xl h-6 overflow-hidden border border-gray-100 p-1">
                                <div class="progress-bar bg-iuea-red h-full rounded-xl transition-all duration-1000 ease-out"
                                    style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            document.addEventListener('DOMContentLoaded', () => {
                const electionId = {{ $election->id }};
                const totalVotesEl = document.getElementById('total-votes');
                const connectionStatus = document.getElementById('connection-status');

                if (typeof Echo !== 'undefined') {
                    Echo.channel(`elections.${electionId}`)
                        .listen('VoteCast', (e) => {
                            updateResults(e.candidateId);
                        })
                        .on('connected', () => {
                            connectionStatus.querySelector('span:first-child').classList.replace('bg-yellow-400', 'bg-green-500');
                            connectionStatus.querySelector('span:last-child').innerText = 'Tactical Link Established';
                            connectionStatus.querySelector('span:last-child').classList.replace('text-gray-400', 'text-green-600');
                        })
                        .on('error', () => {
                            connectionStatus.querySelector('span:first-child').classList.replace('bg-yellow-400', 'bg-red-500');
                            connectionStatus.querySelector('span:last-child').innerText = 'Strategic Link Dropped';
                            connectionStatus.querySelector('span:last-child').classList.replace('text-gray-400', 'text-red-600');
                        });
                } else {
                    connectionStatus.querySelector('span:last-child').innerText = 'Manual Refresh Monitor';
                }

                function updateResults(candidateId) {
                    let currentTotal = parseInt(totalVotesEl.innerText);
                    currentTotal++;

                    // Animate text increment
                    animateCounter(totalVotesEl, parseInt(totalVotesEl.innerText), currentTotal);

                    const candidateRow = document.querySelector(`.candidate-row[data-candidate-id="${candidateId}"]`);
                    if (candidateRow) {
                        const voteCountEl = candidateRow.querySelector('.vote-count');
                        let currentVotes = parseInt(voteCountEl.innerText);
                        currentVotes++;
                        voteCountEl.innerText = currentVotes;

                        candidateRow.classList.add('scale-[1.01]', 'brightness-110');
                        setTimeout(() => candidateRow.classList.remove('scale-[1.01]', 'brightness-110'), 500);
                    }

                    document.querySelectorAll('.candidate-row').forEach(row => {
                        const votes = parseInt(row.querySelector('.vote-count').innerText);
                        const percentage = currentTotal > 0 ? ((votes / currentTotal) * 100).toFixed(1) : 0;

                        row.querySelector('.percentage-label').innerText = percentage + '%';
                        row.querySelector('.progress-bar').style.width = percentage + '%';
                    });
                }

                function animateCounter(el, start, end) {
                    let current = start;
                    const range = end - start;
                    const increment = end > start ? 1 : -1;
                    const stepTime = Math.abs(Math.floor(500 / range));
                    const timer = setInterval(() => {
                        current += increment;
                        el.innerText = current;
                        if (current == end) clearInterval(timer);
                    }, stepTime || 50);
                }
            });
        </script>
    @endpush
</x-app-layout>