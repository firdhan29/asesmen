<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\SurahAssessment;

class BatchAssessment extends Component
{
    // Daftar Surah (Quraisy - Ad-Dhuha + lainnya)
    public $surahs = [
        'Ad-Dhuha', 'Al-Insyirah', 'At-Tin', 'Al-Alaq', 'Al-Qadr', 
        'Al-Bayyinah', 'Az-Zalzalah', 'Al-Adiyat', 'Al-Qariah', 
        'At-Takatsur', 'Al-Ashr', 'Al-Humazah', 'Al-Fil', 'Al-Quraisy'
    ];
    
    public $selectedSurah = 'Al-Quraisy';
    public $students;
    
    // Format array: assessments[student_id] = ['mastery_status' => '', 'keterangan' => '']
    public $assessments = [];

    public function mount()
    {
        $this->students = Student::orderBy('name')->get();
        $this->loadAssessments();
    }

    public function updatedSelectedSurah()
    {
        $this->loadAssessments();
    }

    public function loadAssessments()
    {
        $this->assessments = [];
        $existing = SurahAssessment::where('surah_name', $this->selectedSurah)
            ->get()
            ->keyBy('student_id');

        foreach ($this->students as $student) {
            if ($existing->has($student->id)) {
                $this->assessments[$student->id] = [
                    'mastery_status' => $existing[$student->id]->mastery_status,
                    'keterangan'     => $existing[$student->id]->keterangan,
                ];
            } else {
                $this->assessments[$student->id] = [
                    'mastery_status' => null,
                    'keterangan'     => '',
                ];
            }
        }
    }

    // Hook yang tereksekusi saat radio button (mastery_status) di-klik
    public function updated($propertyName, $value)
    {
        if (preg_match('/assessments\.(\d+)\.mastery_status/', $propertyName, $matches)) {
            $studentId = $matches[1];
            $this->assessments[$studentId]['keterangan'] = $this->getDefaultKeterangan($value);
        }
    }

    // Helper Method Mapping Keterangan
    private function getDefaultKeterangan($status)
    {
        return match ($status) {
            'SL' => 'Hafalan sangat lancar, fasih, dan pengucapan huruf jelas tanpa bantuan.',
            'L'  => 'Hafalan lancar dan jelas, dengan sedikit atau tanpa bantuan.',
            'C'  => 'Hafalan cukup lancar, namun masih ada beberapa bagian yang terlupa.',
            'BL' => 'Hafalan belum lancar, membutuhkan bimbingan dan pengulangan lebih lanjut.',
            default => '',
        };
    }

    public function save()
    {
        foreach ($this->assessments as $studentId => $data) {
            if ($data['mastery_status']) {
                SurahAssessment::updateOrCreate(
                    ['student_id' => $studentId, 'surah_name' => $this->selectedSurah],
                    ['mastery_status' => $data['mastery_status'], 'keterangan' => $data['keterangan']]
                );
            }
        }

        session()->flash('message', 'Penilaian untuk surah ' . $this->selectedSurah . ' berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.batch-assessment');
    }
}
