<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IUEA | Live University Election Portal</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-off-white" x-data="electionDashboard()">
    <div class="relative overflow-hidden min-h-screen">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 glass-panel border-b border-gray-100 shadow-sm px-6 py-4" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center group cursor-pointer" onclick="window.location.href='/'">
                    <x-application-logo
                        class="h-14 w-auto object-contain transition-transform group-hover:scale-105 duration-500" />
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="#live-results" class="text-sm font-bold text-gray-500 hover:text-iuea-red transition">Live
                        Results</a>
                    <a href="#how-it-works" class="text-sm font-bold text-gray-500 hover:text-iuea-red transition">The
                        Process</a>
                    <div class="h-6 w-px bg-gray-200"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-institutional text-sm py-2 px-6">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-extrabold text-charcoal hover:text-iuea-red transition">Login</a>
                        <a href="{{ route('register') }}" class="btn-institutional text-sm py-2 px-6 shadow-sm">Enroll</a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-charcoal hover:text-iuea-red transition p-2 focus:outline-none">
                        <svg class="w-8 h-8" x-show="!mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="w-8 h-8" x-show="mobileMenuOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Drawer -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-10"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-10"
                 class="absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-2xl overflow-hidden z-[60] md:!hidden"
                 style="display: none;">
                <div class="p-8 space-y-8">
                    <div class="flex flex-col space-y-2">
                        <span class="text-[0.6rem] font-black text-iuea-red uppercase tracking-[0.3em] mb-2">Navigation</span>
                        <a href="#live-results" @click="mobileMenuOpen = false" class="text-2xl font-black text-charcoal hover:text-iuea-red transition-all flex items-center justify-between group">
                            <span>Live Results</span>
                            <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                        </a>
                        <div class="h-px bg-gray-50 w-full"></div>
                        <a href="#how-it-works" @click="mobileMenuOpen = false" class="text-2xl font-black text-charcoal hover:text-iuea-red transition-all flex items-center justify-between group">
                            <span>The Process</span>
                            <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    
                    <div class="pt-6 border-t border-gray-50 flex flex-col space-y-4">
                        <span class="text-[0.6rem] font-black text-iuea-red uppercase tracking-[0.3em] mb-2">Account</span>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-institutional w-full py-5 text-lg shadow-xl">Command Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-xl font-black text-charcoal hover:text-iuea-red transition py-2 flex items-center justify-between group">
                                <span>Login</span>
                                <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                            </a>
                            <a href="{{ route('register') }}" class="btn-institutional w-full py-5 text-lg shadow-2xl shadow-iuea-red/20">Enroll Now</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-16 md:pt-44 md:pb-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1
                    class="text-4xl sm:text-6xl md:text-8xl font-extrabold text-charcoal leading-tight tracking-tightest mb-6 md:mb-8 mx-auto max-w-5xl">
                    The Voice of Democracy.
                </h1>
                <p
                    class="text-lg md:text-xl text-gray-500 max-w-2xl mx-auto mb-10 md:mb-12 leading-relaxed font-medium">
                    Experience the highest standard of university democracy. A tamper-proof, high-security ecosystem
                    designed specifically for the International University of East Africa.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-6">
                    <a href="{{ route('register') }}"
                        class="btn-institutional text-base md:text-lg px-8 py-4 md:px-12 md:py-5 shadow-xl hover:-translate-y-1 transition-all">Start
                        Your Vote</a>
                    <a href="#live-results"
                        class="bg-white text-charcoal font-black text-base md:text-lg px-8 py-4 md:px-12 md:py-5 border border-gray-100 rounded-2xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all">View
                        Live Stats</a>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-24 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-extrabold text-charcoal tracking-tightest mb-4 uppercase italic">The Voting
                        Process</h2>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">A 4-step journey to secure
                        university democracy</p>
                </div>

                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Step 1 -->
                    <div class="relative group">
                        <div class="mb-8 relative">
                            <div
                                class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl font-black text-iuea-red border border-gray-100 group-hover:scale-110 transition-transform relative z-10">
                                01</div>
                            <div class="absolute -top-2 -right-2 w-16 h-16 bg-iuea-red/5 blur-xl rounded-full"></div>
                        </div>
                        <h4 class="text-lg font-black text-charcoal mb-3 uppercase">Enrollment</h4>
                        <p class="text-sm text-gray-500 font-medium leading-relaxed">Securely register using your
                            official university registration number and identity.</p>
                        <!-- Connector line -->
                        <div
                            class="hidden md:block absolute top-8 left-20 w-full h-px border-t border-dashed border-gray-200 -z-0">
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative group">
                        <div class="mb-8 relative">
                            <div
                                class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl font-black text-iuea-red border border-gray-100 group-hover:scale-110 transition-transform relative z-10">
                                02</div>
                            <div class="absolute -top-2 -right-2 w-16 h-16 bg-iuea-red/5 blur-xl rounded-full"></div>
                        </div>
                        <h4 class="text-lg font-black text-charcoal mb-3 uppercase">Verification</h4>
                        <p class="text-sm text-gray-500 font-medium leading-relaxed">Multi-layered credential checks
                            ensure an authentic "one student, one vote" protocol.</p>
                        <!-- Connector line -->
                        <div
                            class="hidden md:block absolute top-8 left-20 w-full h-px border-t border-dashed border-gray-200 -z-0">
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative group">
                        <div class="mb-8 relative">
                            <div
                                class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl font-black text-iuea-red border border-gray-100 group-hover:scale-110 transition-transform relative z-10">
                                03</div>
                            <div class="absolute -top-2 -right-2 w-16 h-16 bg-iuea-red/5 blur-xl rounded-full"></div>
                        </div>
                        <h4 class="text-lg font-black text-charcoal mb-3 uppercase">Secure Ballot</h4>
                        <p class="text-sm text-gray-500 font-medium leading-relaxed">Cast your vote for preferred
                            candidates with end-to-end cryptographic privacy.</p>
                        <!-- Connector line -->
                        <div
                            class="hidden md:block absolute top-8 left-20 w-full h-px border-t border-dashed border-gray-200 -z-0">
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative group">
                        <div class="mb-8 relative">
                            <div
                                class="w-16 h-16 bg-iuea-red rounded-2xl shadow-lg shadow-iuea-red/20 flex items-center justify-center text-2xl font-black text-white group-hover:scale-110 transition-transform relative z-10">
                                04</div>
                            <div class="absolute -top-2 -right-2 w-16 h-16 bg-iuea-red/20 blur-xl rounded-full"></div>
                        </div>
                        <h4 class="text-lg font-black text-charcoal mb-3 uppercase">Live Audit</h4>
                        <p class="text-sm text-gray-500 font-medium leading-relaxed">Watch the transparent update of
                            results on the live dashboard as votes are processed.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Live Results Section -->
        <section id="live-results" class="py-24 bg-white relative z-10 border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-end mb-16">
                    <div class="max-w-xl">
                        <h2 class="text-4xl font-extrabold text-charcoal tracking-tightest mb-4 uppercase italic">Live
                            Election Results</h2>
                        <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">Real-time participation and
                            biometric audit feed</p>
                    </div>
                    <div
                        class="mt-8 md:mt-0 flex items-center space-x-4 bg-gray-50 p-2 rounded-2xl border border-gray-100">
                        <div class="px-4 py-2 bg-white rounded-xl shadow-sm border border-gray-100">
                            <span
                                class="block text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Total
                                Votes cast</span>
                            <span class="text-2xl font-black text-iuea-red leading-none tabular-nums"
                                x-text="getTotalGlobalVotes()">0</span>
                        </div>
                        <div class="px-4 py-2">
                            <span
                                class="block text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Live
                                Feed</span>
                            <div class="flex items-center">
                                <span class="flex h-2 w-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                                <span class="text-[0.65rem] font-black text-gray-500 uppercase">Synchronized</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Grid -->
                <div class="space-y-24">
                    <template x-for="(electionGroup, category) in elections" :key="category">
                        <div>
                            <!-- Category Header -->
                            <div class="flex items-center space-x-4 mb-10">
                                <div class="h-px bg-gray-100 flex-grow"></div>
                                <h3 class="text-xl font-black uppercase tracking-[0.3em] text-gray-300"
                                    x-text="formatCategory(category)"></h3>
                                <div class="h-px bg-gray-100 flex-grow"></div>
                            </div>

                            <template x-for="election in electionGroup" :key="election.id">
                                <div class="space-y-12">
                                    <div class="text-center mb-10">
                                        <h4 class="text-3xl font-black text-charcoal mb-2" x-text="election.title"></h4>
                                        <div
                                            class="inline-flex items-center px-3 py-1 bg-gray-50 rounded-lg text-[0.65rem] font-black uppercase text-gray-400 tracking-widest">
                                            <span x-text="election.total_votes"></span> Total Verified Votes
                                        </div>
                                    </div>

                                    <!-- Candidates Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 md:gap-8">
                                        <template x-for="candidate in election.candidates" :key="candidate.id">
                                            <div
                                                class="premium-card bg-white p-6 md:p-8 flex flex-col sm:flex-row items-center sm:items-start border border-gray-100 hover:border-iuea-red/30 transition-all duration-500 group">
                                                <!-- Candidate Photo -->
                                                <div class="relative flex-shrink-0 mb-6 sm:mb-0 sm:mr-8">
                                                    <div
                                                        class="w-24 h-24 md:w-32 md:h-32 rounded-[1.5rem] md:rounded-[2rem] overflow-hidden border-4 border-white shadow-lg relative z-10 group-hover:scale-105 transition-transform duration-500 mx-auto">
                                                        <img :src="candidate.photo_url" :alt="candidate.name"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    <div class="absolute -bottom-1 -right-1 md:-bottom-2 md:-right-2 bg-charcoal text-white text-[0.55rem] md:text-[0.6rem] font-black px-2 py-0.5 md:px-3 md:py-1 rounded-lg z-20 shadow-lg uppercase tracking-widest"
                                                        x-text="candidate.candidate_number"></div>
                                                    <!-- Backdrop Accent -->
                                                    <div
                                                        class="absolute inset-0 bg-iuea-red/10 blur-2xl rounded-full scale-110 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    </div>
                                                </div>

                                                <!-- Candidate Info & Stats -->
                                                <div class="flex-grow w-full text-center sm:text-left">
                                                    <div
                                                        class="flex flex-col sm:flex-row justify-between items-center sm:items-start mb-4">
                                                        <div class="mb-2 sm:mb-0">
                                                            <h5 class="text-lg md:text-xl font-black text-charcoal group-hover:text-iuea-red transition-colors"
                                                                x-text="candidate.name"></h5>
                                                            <p class="text-[0.55rem] md:text-[0.65rem] font-bold text-gray-400 uppercase tracking-widest mt-1"
                                                                x-text="candidate.faculty"></p>
                                                        </div>
                                                        <div class="text-right">
                                                            <span
                                                                class="text-xl md:text-2xl font-black text-charcoal italic"
                                                                x-text="candidate.percentage + '%'"></span>
                                                        </div>
                                                    </div>

                                                    <!-- Progress Bar -->
                                                    <div
                                                        class="relative h-3 md:h-4 bg-gray-50 rounded-full overflow-hidden mb-4 border border-gray-100">
                                                        <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-iuea-red to-iuea-red-light transition-all duration-1000 ease-out shadow-[0_0_15px_rgba(185,28,28,0.2)]"
                                                            :style="'width: ' + candidate.percentage + '%'">
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="flex justify-between items-center text-[0.55rem] md:text-[0.65rem] font-black uppercase tracking-widest text-gray-400">
                                                        <span>Official Vote Count</span>
                                                        <span class="text-charcoal"
                                                            x-text="candidate.votes + ' VOTES'"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Security Section -->
        <section id="security" class="py-32 bg-white relative overflow-hidden border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
                <div class="max-w-3xl mx-auto mb-24">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-charcoal tracking-tight mb-8 uppercase italic">
                        Architected for <span class="text-iuea-red">Absolute Integrity.</span></h2>
                    <p class="text-xl text-gray-500 font-medium leading-relaxed">Security isn't a feature; it's the
                        foundation. Every vote cast on our platform goes through a multi-layered verification protocol
                        to ensure anonymity and reliability.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 text-left">
                    <!-- Immutable Ledger -->
                    <div
                        class="p-10 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm group hover:border-iuea-red/30 hover:shadow-xl hover:shadow-iuea-red/5 transition-all duration-500">
                        <div
                            class="w-14 h-14 bg-iuea-red/5 rounded-2xl flex items-center justify-center mb-8 text-iuea-red group-hover:bg-iuea-red group-hover:text-white transition-all duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-2xl font-extrabold text-charcoal mb-4 uppercase italic">Immutable Ledger</h4>
                        <p class="text-gray-500 font-medium leading-relaxed text-sm">Once a vote is cast, it becomes
                            part of a non-volatile audit trail that cannot be altered or removed.</p>
                    </div>

                    <!-- Zero-Leak Privacy -->
                    <div
                        class="p-10 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm group hover:border-iuea-red/30 hover:shadow-xl hover:shadow-iuea-red/5 transition-all duration-500">
                        <div
                            class="w-14 h-14 bg-iuea-red/5 rounded-2xl flex items-center justify-center mb-8 text-iuea-red group-hover:bg-iuea-red group-hover:text-white transition-all duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-2xl font-extrabold text-charcoal mb-4 uppercase italic">Zero-Leak Privacy</h4>
                        <p class="text-gray-500 font-medium leading-relaxed text-sm">Voter identities are
                            cryptographicaly separated from vote payloads to ensure complete political privacy.</p>
                    </div>

                    <!-- Fraud Detection -->
                    <div
                        class="p-10 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm group hover:border-iuea-red/30 hover:shadow-xl hover:shadow-iuea-red/5 transition-all duration-500">
                        <div
                            class="w-14 h-14 bg-iuea-red/5 rounded-2xl flex items-center justify-center mb-8 text-iuea-red group-hover:bg-iuea-red group-hover:text-white transition-all duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-2xl font-extrabold text-charcoal mb-4 uppercase italic">Fraud Detection</h4>
                        <p class="text-gray-500 font-medium leading-relaxed text-sm">Our proprietary heuristics monitor
                            for abnormal voting patterns and multiple-access attempts in real-time.</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 w-1/3 h-1/2 bg-gradient-to-tl from-iuea-red/5 to-transparent"></div>
        </section>

        <!-- Footer -->
        <footer class="py-24 bg-gray-50 text-center relative overflow-hidden border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6 flex flex-col items-center relative z-10">
                <div class="flex items-center mb-12 group cursor-pointer" onclick="window.location.href='/'">
                    <x-application-logo
                        class="h-16 w-auto object-contain transition-all duration-500 group-hover:scale-105" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 w-full mb-16 pt-16 border-t border-gray-200">
                    <div class="text-left space-y-6">
                        <div class="flex items-center space-x-2">
                            <div class="h-4 w-1 bg-iuea-red rounded-full"></div>
                            <h5 class="text-sm font-black text-charcoal uppercase tracking-[0.2em]">Governance</h5>
                        </div>
                        <ul class="space-y-4 text-[0.7rem] font-bold text-gray-400 uppercase tracking-widest">
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Electoral Guidelines</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Constitution</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Election Schedule</a></li>
                        </ul>
                    </div>
                    <div class="text-left space-y-6">
                        <div class="flex items-center space-x-2">
                            <div class="h-4 w-1 bg-iuea-red rounded-full"></div>
                            <h5 class="text-sm font-black text-charcoal uppercase tracking-[0.2em]">Verification</h5>
                        </div>
                        <ul class="space-y-4 text-[0.7rem] font-bold text-gray-400 uppercase tracking-widest">
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Biometric Protocol</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Audit Logs</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Registry Status</a></li>
                        </ul>
                    </div>
                    <div class="text-left space-y-6">
                        <div class="flex items-center space-x-2">
                            <div class="h-4 w-1 bg-iuea-red rounded-full"></div>
                            <h5 class="text-sm font-black text-charcoal uppercase tracking-[0.2em]">Institutional</h5>
                        </div>
                        <ul class="space-y-4 text-[0.7rem] font-bold text-gray-400 uppercase tracking-widest">
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Office of the Registrar</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">Digital Systems</a></li>
                            <li><a href="#" class="hover:text-iuea-red hover:translate-x-1 inline-block transition-all duration-300">IT Support</a></li>
                        </ul>
                    </div>
                </div>

                <div
                    class="w-full pt-10 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-6">
                    <p class="text-[0.65rem] font-black text-gray-400 uppercase tracking-[0.3em]">&copy;
                        {{ date('Y') }} <span class="text-iuea-red">International University of East Africa.</span> All Rights Reserved.
                    </p>

                    <div
                        class="flex items-center space-x-6 text-[0.6rem] text-gray-400 font-black uppercase tracking-widest">
                        <span class="hover:text-iuea-red transition cursor-pointer">Privacy Protocol</span>
                        <div class="w-1 h-1 bg-gray-300 rounded-full"></div>
                        <span class="hover:text-iuea-red transition cursor-pointer">Security Standards</span>
                    </div>
                </div>
            </div>

            <!-- Branding Accent -->
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-iuea-red/5 blur-[120px] rounded-full"></div>
        </footer>
    </div>

    <script>
        function electionDashboard() {
            return {
                elections: @json($elections),

                init() {
                    // Poll for live stats every 30 seconds
                    setInterval(() => {
                        this.fetchStats();
                    }, 30000);
                },

                async fetchStats() {
                    try {
                        const response = await fetch('{{ route("api.election-stats") }}');
                        const data = await response.json();
                        this.elections = data;
                    } catch (error) {
                        console.error('Audit sync failed:', error);
                    }
                },

                formatCategory(category) {
                    return category.replace('_', ' ');
                },

                getTotalGlobalVotes() {
                    let total = 0;
                    Object.values(this.elections).forEach(electionGroup => {
                        electionGroup.forEach(election => {
                            total += election.total_votes;
                        });
                    });
                    return total.toLocaleString();
                }
            }
        }
    </script>
</body>

</html>