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

	public function generateAndSavePDF($view, $data = [], $path, $filename)
	{
		$pdf = PDF::loadView($view, $data);
		if($pdf->save(storage_path('app/'. $path) . '/' . $filename))
		{
			return TRUE;
		}

		return FALSE;
	}


}
