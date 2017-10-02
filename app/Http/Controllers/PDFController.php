<?php

namespace App\Http\Controllers;




use App\Models\ScholarshipApplicationDean;
use PDF;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
	public function deanScholarshipTranscript($record_id)
	{
		$application = ScholarshipApplicationDean::find($record_id);
		$finder = new File();
		if ($finder->isFile(storage_path('app/' . $application->transcript_file_name)))
		{
			$file = $finder->get(storage_path('app/' . $application->transcript_file_name));
			$response = Response::make($file, 200);
			$response->header('Content-Type', 'application/pdf');
			return $response;
		}
		else
		{
			dd($record_id);
		}
	}

	public function generatePDF()
	{
		$data = 'a test of generating pdf';
		$pdf = PDF::loadView('functionality_trials.pdf', compact('data'));
//		return $pdf->download('test_pdf.pdf');
		$pdf->save(storage_path('app') . '/' . 'test_pdf.pdf');
		return 'pdf saved';
	}


}
