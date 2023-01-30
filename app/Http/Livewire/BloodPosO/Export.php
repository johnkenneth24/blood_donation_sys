<?php

namespace App\Http\Livewire\BloodPosO;

use App\Helpers\LogActivity;
use Livewire\Component;
use App\Models\Donor;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{

    public const TEMPLATE_PATH_A = 'docx/blood-type-pos-o.docx';

    public function export()
    {
        $path = storage_path(self::TEMPLATE_PATH_A);
        $templateProcessor = new TemplateProcessor($path);

        $donors = Donor::where('blood_type', 'O+')->get();

        $totalBloodBag = $donors->sum('bag_blood');

        $templateProcessor->setValue('totalBloodBag', $totalBloodBag);

        $donorCount = $donors->count();
        if ($donorCount <= 0) {
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'No record found!']);
            return back();
        }

        $donor_a = $donors->filter(function ($donor) {
            return $donor->blood_type == 'O+';
        });

        $resCount = $donor_a->count();

        if ($resCount > 0) {
            $templateProcessor->cloneRow('n', $resCount);
            $i = 1;

            foreach ($donor_a as $i => $donor) {
                $templateProcessor->setValue('n#' . ($i + 1), $i + 1);
                $templateProcessor->setValue('name#' . ($i + 1), $donor->lastname . ', ' . $donor->firstname . ' ' . $donor->middlename);
                $templateProcessor->setValue('gender#' . ($i + 1), $donor->gender);
                $templateProcessor->setValue('age#' . ($i + 1), $donor->age);
                $templateProcessor->setValue('address#' . ($i + 1), $donor->address);
                $templateProcessor->setValue('cont_no#' . ($i + 1), $donor->contact_no);
                $templateProcessor->setValue('blood_bag#' . ($i + 1), $donor->bag_blood);
            }
        }

        LogActivity::addToLog('Exported Blood Type O+ records');

        $filename = 'blood_pos_O-' . date('Y-m-d');
        $tempPath = 'reports/' . $filename . '.docx';

        // save the file, if folder not exist create it
        if (!file_exists(storage_path('reports'))) {
            mkdir(storage_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs(storage_path($tempPath));
        return response()->download(storage_path($tempPath));
    }

    public function render()
    {
        return view('livewire.blood-pos-o.export');
    }
}
