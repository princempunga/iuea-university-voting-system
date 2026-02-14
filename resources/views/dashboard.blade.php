<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
            <h2 class="text-2xl font-black text-charcoal tracking-tight">
                {{ __('Official Command Center') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            @if(Auth::user()->role === 'admin')
                <!-- Administrative Command Header -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div
                        class="lg:col-span-3 premium-card p-10 bg-white border border-gray-100 relative overflow-hidden group hover:shadow-2xl hover:shadow-iuea-red/5 transition-all duration-500">
                        <div class="relative z-10">
                            <div class="flex items-center space-x-3 mb-6">
                                <div
                                    class="px-3 py-1 bg-green-50 rounded-full flex items-center space-x-2 border border-green-100">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                    <span class="text-[0.6rem] font-bold uppercase tracking-[0.2em] text-green-700">System
                                        Secure & Operational</span>
                                </div>
                            </div>
                            <h3 class="text-3xl font-black text-charcoal mb-4 tracking-tight uppercase italic">Welcome back,
                                <span class="text-iuea-red">Administrator.</span>
                            </h3>
                            <p class="text-sm text-gray-500 font-medium max-w-xl leading-relaxed">
                                You are overseeing the 2026/2027 Electoral Process. All cryptographic logs and biometric
                                verifications are currently passing integrity checks.
                            </p>
                            <div class="mt-10 flex items-center space-x-8">
                                <div class="flex -space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-xl border-4 border-white bg-gray-100 flex items-center justify-center text-[0.65rem] font-black text-charcoal shadow-sm ring-1 ring-gray-100">
                                        JD</div>
                                    <div
                                        class="w-10 h-10 rounded-xl border-4 border-white bg-gray-50 flex items-center justify-center text-[0.65rem] font-black text-charcoal shadow-sm ring-1 ring-gray-100">
                                        AS</div>
                                    <div
                                        class="w-10 h-10 rounded-xl border-4 border-white bg-iuea-red/10 flex items-center justify-center text-[0.65rem] font-black text-iuea-red shadow-sm ring-1 ring-iuea-red/20">
                                        +2</div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest">4 Active
                                        Admin Sessions</span>
                                    <span
                                        class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-widest mt-0.5">Live
                                        Surveillance Active</span>
                                </div>
                            </div>
                        </div>
                        <!-- Branding Accent -->
                        <div
                            class="absolute -top-24 -right-24 w-64 h-64 bg-iuea-red/5 blur-[100px] rounded-full group-hover:bg-iuea-red/10 transition-colors duration-700">
                        </div>
                        <div
                            class="absolute bottom-0 right-0 w-1/2 h-1/2 bg-gradient-to-tl from-gray-50/50 to-transparent pointer-events-none">
                        </div>
                    </div>

                    <div class="premium-card p-8 bg-gray-50 flex flex-col justify-between border-dashed border-2">
                        <div>
                            <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-2 block">Quick
                                Directive</span>
                            <h4 class="text-sm font-black text-charcoal">Global System Audit</h4>
                            <p class="text-xs text-gray-400 mt-2 font-medium">Generate a comprehensive integrity report for
                                all active polls.</p>
                        </div>
                        <button
                            class="mt-6 text-[0.65rem] font-black text-iuea-red uppercase tracking-widest hover:underline text-left">Initiate
                            Audit →</button>
                    </div>
                </div>

                <!-- Strategic Analytic Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="premium-card p-6 group hover:border-iuea-red/20 transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Election
                                Registry</span>
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-charcoal">{{ $totalElections }}</span>
                            <span class="text-[0.6rem] font-bold text-green-500 uppercase">+1 New</span>
                        </div>
                        <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-2">Active Frameworks</p>
                    </div>

                    <div class="premium-card p-6 group hover:border-iuea-red/20 transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Authorized
                                Candidates</span>
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-charcoal">{{ $totalCandidates }}</span>
                        </div>
                        <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-2">Verified Profiles</p>
                    </div>

                    <div class="premium-card p-6 group hover:border-iuea-red/20 transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Total
                                Participation</span>
                            <svg class="w-4 h-4 text-iuea-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-charcoal">{{ $totalVotes }}</span>
                            <span class="text-[0.6rem] font-bold text-iuea-red uppercase">Live feed</span>
                        </div>
                        <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-2">Secure Tokens Issued</p>
                    </div>

                    <div class="premium-card p-6 group hover:border-iuea-red/20 transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest">Registered
                                Students</span>
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-3xl font-black text-charcoal">{{ $totalStudents }}</span>
                        </div>
                        <p class="text-[0.6rem] font-bold text-gray-400 uppercase mt-2">Verified Identities</p>
                    </div>
                </div>

                <!-- Live Administrative Hub -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    <div class="lg:col-span-8">
                        <div class="flex justify-between items-center mb-10">
                            <h4 class="text-2xl font-black text-charcoal tracking-tight">Governance Live Hub</h4>
                            <span class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">Latest Update:
                                {{ now()->format('H:i T') }}</span>
                        </div>

                        <div class="premium-card overflow-hidden overflow-x-auto custom-scrollbar">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50/50 border-b border-gray-100">
                                    <tr>
                                        <th
                                            class="px-8 py-4 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                            Active Series</th>
                                        <th
                                            class="px-8 py-4 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                            Turnout</th>
                                        <th
                                            class="px-8 py-4 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest text-right">
                                            Operational Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @php
                                        $activeElections = \App\Models\Election::latest()->take(5)->get();
                                    @endphp
                                    @foreach($activeElections as $activeElection)
                                        <tr class="group hover:bg-gray-50/50 transition-colors">
                                            <td class="px-8 py-5">
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-black text-charcoal group-hover:text-iuea-red transition-colors">{{ $activeElection->title }}</span>
                                                    <span
                                                        class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-widest mt-0.5">{{ str_replace('_', ' ', $activeElection->category) }}</span>
                                                </div>
                                            </td>
                                            <td class="px-8 py-5">
                                                <div class="flex flex-col">
                                                    <div
                                                        class="flex items-center space-x-2 text-[0.6rem] font-black text-gray-400 uppercase tracking-tighter">
                                                        <span class="w-1 h-1 rounded-full bg-green-400"></span>
                                                        <span>Open: {{ $activeElection->start_time->format('M d, H:i') }}</span>
                                                    </div>
                                                    <div
                                                        class="flex items-center space-x-2 text-[0.6rem] font-black text-gray-400 uppercase tracking-tighter mt-1">
                                                        <span class="w-1 h-1 rounded-full bg-iuea-red"></span>
                                                        <span>Close: {{ $activeElection->end_time->format('M d, H:i') }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-8 py-5 text-right">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 bg-green-50 text-green-700 border border-green-100 rounded text-[0.55rem] font-black uppercase tracking-widest">
                                                    {{ $activeElection->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-6 bg-gray-50/50 text-center border-t border-gray-100">
                                <a href="{{ route('admin.elections.index') }}"
                                    class="text-[0.65rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">View
                                    All Electoral Records</a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 space-y-8">
                        <div>
                            <h4 class="text-sm font-black text-charcoal uppercase tracking-[0.2em] mb-6">Strategic
                                Directives</h4>
                            <div class="space-y-4">
                                <a href="{{ route('admin.elections.create') }}"
                                    class="premium-card p-5 flex items-center space-x-4 hover:border-iuea-red/30 group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-iuea-red/5 flex items-center justify-center text-iuea-red group-hover:bg-iuea-red group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-black text-charcoal uppercase tracking-widest">New Election
                                        Series</span>
                                </a>
                                <a href="{{ route('admin.candidates.create') }}"
                                    class="premium-card p-5 flex items-center space-x-4 hover:border-iuea-red/30 group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-charcoal/5 flex items-center justify-center text-charcoal group-hover:bg-charcoal group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-black text-charcoal uppercase tracking-widest">Authorize
                                        Candidate</span>
                                </a>
                            </div>
                        </div>

                        <div class="premium-card p-8 bg-white border border-gray-100 relative overflow-hidden group">
                            <div class="relative z-10">
                                <h4
                                    class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-iuea-red mb-6 border-b border-gray-100 pb-4 flex items-center">
                                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Security Feed
                                </h4>
                                <div class="space-y-6">
                                    <div class="flex items-start space-x-4">
                                        <div class="w-1.5 h-1.5 rounded-full bg-blue-500 mt-1.5 shadow-sm shadow-blue-200">
                                        </div>
                                        <div>
                                            <p class="text-[0.65rem] font-bold text-charcoal uppercase tracking-tight">
                                                Database Synced</p>
                                            <p class="text-[0.55rem] font-medium text-gray-400 mt-0.5">Automated backup
                                                protocol complete.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-4">
                                        <div
                                            class="w-1.5 h-1.5 rounded-full bg-green-500 mt-1.5 shadow-sm shadow-green-200">
                                        </div>
                                        <div>
                                            <p class="text-[0.65rem] font-bold text-charcoal uppercase tracking-tight">
                                                Verification Live</p>
                                            <p class="text-[0.55rem] font-medium text-gray-400 mt-0.5">Biometric modules
                                                initialized.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-gray-50 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Student Voting Center Header -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div
                        class="lg:col-span-3 premium-card p-10 bg-white border border-gray-100 relative overflow-hidden group hover:shadow-2xl hover:shadow-iuea-red/5 transition-all duration-500">
                        <div class="relative z-10">
                            <div class="flex items-center space-x-3 mb-6">
                                <div
                                    class="px-3 py-1 bg-iuea-red/5 rounded-full flex items-center space-x-2 border border-iuea-red/10">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-iuea-red animate-pulse"></span>
                                    <span class="text-[0.6rem] font-bold uppercase tracking-[0.2em] text-iuea-red">Identity
                                        Verified & Secure</span>
                                </div>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-black text-charcoal mb-4 tracking-tight uppercase italic">Welcome to the,
                                <span class="text-iuea-red">Student Portal.</span>
                            </h3>
                            <p class="text-sm text-gray-500 font-medium max-w-xl leading-relaxed">
                                You are currently authenticated within the IUEA Democratic Ecosystem. Access your assigned
                                voting booths below to participate in active governance.
                            </p>
                            <div class="mt-10 flex items-center space-x-8">
                                <div class="flex -space-x-3">
                                    <div
                                        class="w-10 h-10 rounded-xl border-4 border-white bg-iuea-red text-white flex items-center justify-center text-[0.65rem] font-black shadow-sm ring-1 ring-iuea-red/20">
                                        {{ substr(Auth::user()->name, 0, 1) }}</div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[0.65rem] font-black text-charcoal uppercase tracking-widest">Active
                                        Voter Session</span>
                                    <span
                                        class="text-[0.55rem] font-bold text-gray-400 uppercase tracking-widest mt-0.5">Registration:
                                        {{ Auth::user()->registration_number ?? 'Verified' }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Branding Accent -->
                        <div
                            class="absolute -top-24 -right-24 w-64 h-64 bg-charcoal/5 blur-[100px] rounded-full group-hover:bg-charcoal/10 transition-colors duration-700">
                        </div>
                    </div>

                    <div class="premium-card p-8 bg-gray-50 flex flex-col justify-between border-dashed border-2">
                        <div>
                            <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400 mb-2 block">Quick
                                Action</span>
                            <h4 class="text-sm font-black text-charcoal">Electoral Guidelines</h4>
                            <p class="text-xs text-gray-400 mt-2 font-medium">Review the official IUEA handbook for
                                transparent voting procedures.</p>
                        </div>
                        <button
                            class="mt-6 text-[0.65rem] font-black text-iuea-red uppercase tracking-widest hover:underline text-left">View
                            Handbook →</button>
                    </div>
                </div>

                <!-- Student Voting Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    <div class="lg:col-span-8 space-y-10">
                        <div class="flex justify-between items-center">
                            <h4 class="text-2xl font-black text-charcoal tracking-tight italic uppercase">Active Voting
                                Booths</h4>
                            <a href="{{ route('elections.index') }}"
                                class="text-[0.65rem] font-black text-iuea-red uppercase tracking-[0.2em] hover:translate-x-1 transition-transform inline-flex items-center">
                                View Full Portal
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            @php
                                $elections = \App\Models\Election::where('is_active', true)
                                    ->where('status', 'active')
                                    ->take(4)
                                    ->get();
                            @endphp
                            @forelse($elections as $election)
                                <div class="premium-card p-8 bg-white border border-gray-100 group hover:border-iuea-red/30 transition-all duration-500">
                                    <div class="flex justify-between items-start mb-6">
                                        <div class="space-y-1">
                                            <span class="text-[0.55rem] font-black text-gray-400 uppercase tracking-widest block">Election Series 2024/25</span>
                                            <h5 class="text-xl font-black text-charcoal group-hover:text-iuea-red transition-colors leading-tight">{{ $election->title }}</h5>
                                        </div>
                                        <span class="inline-flex items-center px-2 py-1 bg-green-50 text-green-700 border border-green-100 rounded text-[0.5rem] font-black uppercase tracking-widest">Polling Open</span>
                                    </div>
                                    <div class="flex items-center text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest mb-8">
                                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Closes {{ $election->end_time->format('M d, H:i') }}
                                    </div>
                                    <a href="{{ route('elections.show', $election) }}" class="w-full flex items-center justify-center py-4 bg-gray-50 rounded-xl text-[0.65rem] font-black text-charcoal uppercase tracking-widest group-hover:bg-iuea-red group-hover:text-white transition-all">
                                        Enter Voting Booth
                                    </a>
                                </div>
                            @empty
                                <div class="col-span-2 premium-card p-16 text-center bg-gray-50/50 border-dashed border-2">
                                    <h5 class="text-lg font-bold text-gray-400">No Active Elections at this Moment</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="lg:col-span-4 space-y-10">
                        <h4 class="text-xl font-black text-charcoal tracking-tight italic uppercase">Recent Activity</h4>
                        <div class="premium-card p-8 bg-white border border-gray-100">
                            @php
                                $recentVoted = Auth::user()->votedElections()->latest()->take(4)->get();
                            @endphp
                            <div class="flow-root">
                                <ul class="-mb-8">
                                    @forelse($recentVoted as $election)
                                        <li class="relative pb-8">
                                            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gray-50"></span>
                                            <div class="relative flex space-x-4">
                                                <div class="flex-shrink-0">
                                                    <span class="h-8 w-8 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center text-green-600">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="text-[0.65rem] font-black text-charcoal uppercase tracking-tight">Vote Successfully Sealed</p>
                                                    <p class="text-[0.55rem] text-gray-400 font-bold mt-0.5 uppercase tracking-widest truncate">{{ $election->title }}</p>
                                                    <span class="mt-2 text-[0.5rem] font-black text-gray-300 uppercase tracking-[0.2em] block italic">Audit Hash: {{ substr(md5($election->id . Auth::id()), 0, 12) }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <div class="text-center py-8">
                                            <p class="text-[0.6rem] font-black text-gray-300 uppercase tracking-widest italic">No Institutional Records Found</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="premium-card p-8 bg-white border border-gray-100 relative overflow-hidden group">
                            <div class="relative z-10">
                                <h4 class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-iuea-red mb-4 flex items-center">
                                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    Security Protocol
                                </h4>
                                <p class="text-xs text-gray-500 font-medium leading-relaxed">
                                    Your biometric identity is currently masked from the electoral roll until decryption at poll closure.
                                </p>
                            </div>
                            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-gray-50 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>