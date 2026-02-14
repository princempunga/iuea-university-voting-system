<div class="fixed inset-y-0 left-0 w-72 bg-dark-red text-white flex flex-col z-50 transform transition-transform duration-300 lg:translate-x-0"
    :class="{ '-translate-x-full': !sidebarOpen }">

    <!-- Institutional Branding -->
    <div class="p-8 border-b border-white/10">
        <div class="flex items-center space-x-4 group cursor-pointer" onclick="window.location.href='/'">
            <div class="p-2 bg-white rounded-xl shadow-lg transition-transform group-hover:scale-110 duration-500">
                <x-application-logo class="h-10 w-auto" />
            </div>
        </div>
    </div>

    <!-- Navigation Architecture -->
    <nav class="flex-1 overflow-y-auto p-6 space-y-8 custom-scrollbar">
        <!-- Main Logic -->
        <div>
            <span class="text-[0.6rem] font-black text-white/40 uppercase tracking-[0.2em] px-4 block mb-4">Core
                Management</span>
            <div class="space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="text-xs font-black uppercase tracking-widest">Dashboard</span>
                </a>
            </div>
        </div>

        @if(Auth::user()->role === 'admin')
            <!-- Electoral Governance (Admin) -->
            <div>
                <span
                    class="text-[0.6rem] font-black text-white/40 uppercase tracking-[0.2em] px-4 block mb-4">Governance</span>
                <div class="space-y-1">
                    <a href="{{ route('admin.elections.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.elections.*') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Manage Elections</span>
                    </a>
                    <a href="{{ route('admin.candidates.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.candidates.*') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Candidates</span>
                    </a>
                    <a href="{{ route('admin.students.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.students.*') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Student Database</span>
                    </a>
                </div>
            </div>

            <!-- Intelligence (Admin) -->
            <div>
                <span
                    class="text-[0.6rem] font-black text-white/40 uppercase tracking-[0.2em] px-4 block mb-4">Intelligence</span>
                <div class="space-y-1">
                    <a href="{{ route('admin.intelligence.analytics') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.intelligence.analytics') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Audit Analytics</span>
                    </a>
                    <a href="{{ route('admin.intelligence.logs') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.intelligence.logs') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Security Logs</span>
                    </a>
                </div>
            </div>
        @else
            <!-- Voting Services (Student) -->
            <div>
                <span class="text-[0.6rem] font-black text-white/40 uppercase tracking-[0.2em] px-4 block mb-4">Voting
                    Center</span>
                <div class="space-y-1">
                    <a href="{{ route('elections.index') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('elections.*') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">Active Polls</span>
                    </a>
                </div>
            </div>

            <!-- Identity & History (Student) -->
            <div>
                <span
                    class="text-[0.6rem] font-black text-white/40 uppercase tracking-[0.2em] px-4 block mb-4">Account</span>
                <div class="space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('profile.*') ? 'bg-white/10 text-white shadow-lg border border-white/10' : 'text-white/60 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest">My Profile</span>
                    </a>
                </div>
            </div>
        @endif
    </nav>

    <!-- Profile Summary -->
    <div class="p-6 border-t border-white/10 bg-black/10">
        <div class="flex items-center space-x-4 mb-4">
            <div
                class="w-10 h-10 rounded-xl bg-white text-dark-red flex items-center justify-center text-xs font-black shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex flex-col overflow-hidden">
                <span
                    class="text-[0.65rem] font-black uppercase tracking-widest text-white truncate">{{ Auth::user()->name }}</span>
                <span class="text-[0.5rem] font-bold text-white/50 uppercase tracking-widest">
                    {{ Auth::user()->role === 'admin' ? 'System Overseer' : 'Verified Voter' }}
                </span>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center space-x-2 py-3 bg-white/10 shadow-lg border border-white/10 rounded-xl text-white hover:bg-white hover:text-dark-red transition-all group">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span class="text-[0.6rem] font-black uppercase tracking-[0.2em]">Terminate Session</span>
            </button>
        </form>
    </div>
</div>