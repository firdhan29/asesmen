<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        
        <!-- Header -->
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Penilaian Kelas: <span class="text-indigo-600">2 Dua</span></h2>
                <p class="text-sm text-gray-500 mt-1">Tahun Ajaran 2025-2026 | Semester Genap</p>
            </div>
            
            <div class="w-full md:w-64">
                <select wire:model.live="selectedSurah" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm font-medium text-gray-700 p-2 border">
                    @foreach($surahs as $surah)
                        <option value="{{ $surah }}">{{ $surah }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 m-6 mb-0 text-sm text-green-700">
                {{ session('message') }}
            </div>
        @endif

        <!-- Responsive Table -->
        <div class="overflow-x-auto p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-indigo-50 text-indigo-900 text-sm">
                        <th class="p-4 font-semibold rounded-tl-lg">No</th>
                        <th class="p-4 font-semibold">Nama Siswa</th>
                        <th class="p-4 font-semibold text-center">Status Mastery</th>
                        <th class="p-4 font-semibold rounded-tr-lg w-1/3">Keterangan Khusus</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($students as $index => $student)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-500">{{ $index + 1 }}</td>
                        <td class="p-4 font-medium text-gray-800">{{ $student->name }}</td>
                        <td class="p-4">
                            <!-- Custom Radio Buttons -->
                            <div class="flex items-center justify-center space-x-3">
                                @foreach(['SL', 'L', 'C', 'BL'] as $status)
                                <label class="cursor-pointer group flex flex-col items-center">
                                    <input type="radio" 
                                        wire:model.live="assessments.{{ $student->id }}.mastery_status" 
                                        value="{{ $status }}" 
                                        class="peer sr-only">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 border-gray-200 text-sm font-bold text-gray-500 peer-checked:bg-indigo-600 peer-checked:border-indigo-600 peer-checked:text-white transition-all shadow-sm group-hover:border-indigo-300">
                                        {{ $status }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-4">
                            <textarea 
                                wire:model="assessments.{{ $student->id }}.keterangan" 
                                rows="2" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border bg-gray-50"
                                placeholder="Pilih status untuk auto-fill..."></textarea>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer / Save Action -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end">
            <button wire:click="save" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-6 rounded-lg shadow-sm transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Simpan Penilaian Batch
            </button>
        </div>
    </div>
</div>
