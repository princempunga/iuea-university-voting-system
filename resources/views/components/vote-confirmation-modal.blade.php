<div id="vote-modal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-charcoal/80 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
            <div class="bg-iuea-red h-2 w-full"></div>

            <div class="p-10">
                <div class="flex items-center justify-center mb-8">
                    <div
                        class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-iuea-red border border-red-100 shadow-sm animate-pulse">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="text-center mb-10">
                    <h3 class="text-2xl font-black text-charcoal tracking-tight mb-2" id="modal-title">Confirm Final
                        Decision</h3>
                    <p class="text-sm text-gray-400 font-medium tracking-tight">You are about to cast your vote for:</p>
                    <p class="text-xl font-extrabold text-iuea-red mt-2" id="candidate-name-display">[Candidate Name]
                    </p>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 mb-10">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <svg class="w-5 h-5 text-iuea-red" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="ml-3 text-[0.7rem] font-bold text-gray-400 uppercase tracking-widest leading-relaxed">
                            institutional notice: This action is irreversible. once submitted, your vote will be
                            cryptographically sealed and added to the official record.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="button" onclick="window.closeVoteModal()"
                        class="flex-1 px-8 py-4 bg-gray-100 text-gray-500 font-bold rounded-xl hover:bg-gray-200 transition active:scale-95">
                        Cancel Access
                    </button>
                    <form id="vote-form" method="POST" action="{{ route('vote.store') }}" class="flex-1">
                        @csrf
                        <input type="hidden" name="election_id" id="modal-election-id">
                        <input type="hidden" name="candidate_id" id="modal-candidate-id">
                        <button type="submit"
                            class="w-full px-8 py-4 bg-iuea-red text-white font-bold rounded-xl shadow-lg hover:bg-iuea-red-light transition-all transform hover:-translate-y-0.5 active:scale-95">
                            Submit Vote
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.confirmVote = (id, name, electionId) => {
        document.getElementById('modal-candidate-id').value = id;
        document.getElementById('modal-election-id').value = electionId;
        document.getElementById('candidate-name-display').innerText = name;
        document.getElementById('vote-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeVoteModal = () => {
        document.getElementById('vote-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    };
</script>