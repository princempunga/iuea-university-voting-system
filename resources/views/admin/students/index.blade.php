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
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="w-1 h-8 bg-iuea-red rounded-full"></div>
                <div>
                    <span class="text-[0.6rem] font-black uppercase tracking-[0.2em] text-gray-400">Institutional
                        Registry</span>
                    <h2 class="text-2xl font-black text-charcoal tracking-tight">
                        {{ __('Student Database') }}
                    </h2>
                </div>
            </div>
            <div class="text-right">
                <span class="text-3xl font-black text-charcoal">{{ $students->total() }}</span>
                <p class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest">Verified Students Registered
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="premium-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50/50 border-b border-gray-100">
                            <tr>
                                <th class="px-8 py-5 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                    Student Profile</th>
                                <th class="px-8 py-5 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                    Registration ID</th>
                                <th class="px-8 py-5 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                    Email Address</th>
                                <th class="px-8 py-5 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest">
                                    Validation Status</th>
                                <th
                                    class="px-8 py-5 text-[0.6rem] font-black text-gray-400 uppercase tracking-widest text-right">
                                    System Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($students as $student)
                                <tr class="group hover:bg-gray-50/30 transition-colors">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <div
                                                class="w-10 h-10 rounded-xl bg-iuea-red/5 flex items-center justify-center text-iuea-red font-black text-xs border border-iuea-red/10 shadow-sm">
                                                {{ substr($student->name, 0, 1) }}{{ substr(strrchr($student->name, ' '), 1, 1) }}
                                            </div>
                                            <div>
                                                <div
                                                    class="text-sm font-black text-charcoal group-hover:text-iuea-red transition-colors">
                                                    {{ $student->name }}</div>
                                                <div
                                                    class="text-[0.6rem] font-bold text-gray-400 uppercase tracking-widest mt-0.5">
                                                    Verified Identity</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span
                                            class="text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $student->registration_number }}</span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="text-xs font-medium text-gray-500">{{ $student->email }}</span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-sm shadow-green-200"></span>
                                            <span
                                                class="text-[0.6rem] font-black text-green-700 uppercase tracking-widest px-2 py-0.5 bg-green-50 border border-green-100 rounded">Secure</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-right">
                                        <button
                                            class="text-[0.6rem] font-black text-gray-400 uppercase tracking-widest hover:text-iuea-red transition-colors">
                                            View Logs
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-12 text-center">
                                        <p class="text-xs font-black text-gray-300 uppercase tracking-widest">No Student
                                            Records Found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($students->hasPages())
                    <div class="p-6 bg-gray-50/30 border-t border-gray-100">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>