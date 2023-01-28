<?php

namespace App\Http\Livewire\BloodNegA;

use Livewire\Component;
use App\Models\Donor;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{

    public const TEMPLATE_PATH_NEG_A = 'docx/blood-type-neg-a.docx';

    public function export()
    {
        $path = storage_path(self::TEMPLATE_PATH_NEG_A);
        $templateProcessor = new TemplateProcessor($path);

        $donors = Donor::where('blood_type', 'A-')->get();

        $totalBloodBag = $donors->sum('bag_blood');

        $templateProcessor->setValue('totalBloodBag', $totalBloodBag);

        $donorCount = $donors->count();
        if ($donorCount <= 0) {
            $this->dispatchBrowserEvent('OfficialError', ['message' => 'No record found!']);
            return back();
        }

        $donor_blood = $donors->filter(function($donor){
            return $donor->blood_type == 'A-';
        });

        $resCount = $donor_blood->count();

        if($resCount > 0)
        {
            $templateProcessor->cloneRow('n', $resCount);
            $i = 1;

            foreach ($donor_blood as $i => $donor)
            {
                $templateProcessor->setValue('n#' . ($i + 1), $i + 1);
                $templateProcessor->setValue('name#' . ($i + 1), $donor->lastname);
                $templateProcessor->setValue('gender#' . ($i + 1), $donor->gender);
                $templateProcessor->setValue('age#' . ($i + 1), $donor->age);
                $templateProcessor->setValue('address#' . ($i + 1), $donor->address);
                $templateProcessor->setValue('cont_no#' . ($i + 1), $donor->contact_no);
                $templateProcessor->setValue('blood_bag#' . ($i + 1), $donor->bag_blood);
            }
        }

        $filename = 'blood_neg_A-' . date('Y-m-d');
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
        return view('livewire.blood-neg-a.export');
    }
}