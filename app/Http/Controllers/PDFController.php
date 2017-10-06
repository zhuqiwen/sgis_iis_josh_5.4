<?php

namespace App\Http\Controllers;




use App\Models\ScholarshipApplicationDean;
use LynX39\LaraPdfMerger\PDFManage;
use PDF;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{

    public function deanScholarshipApplicationFile($record_id, $file)
    {
        $map = [
            'transcript' => 'transcript_file_name',
            'acceptance_letter' => 'accept_letter_file_name',
            'recommendation' => 'recommendation_file_name',
	        'package' => 'package_file_name',
        ];

        $application = ScholarshipApplicationDean::find($record_id);
        $finder = new File();
        if ($finder->isFile(storage_path('app/' . $application[$map[$file]])))
        {
            $file = $finder->get(storage_path('app/' . $application[$map[$file]]));
            $response = Response::make($file, 200);
            $response->header('Content-Type', 'application/pdf');
            return $response;
        }
        else
        {
            dd($record_id);
        }
    }

//	public function deanScholarshipTranscript($record_id)
//	{
//		$application = ScholarshipApplicationDean::find($record_id);
//		$finder = new File();
//		if ($finder->isFile(storage_path('app/' . $application->transcript_file_name)))
//		{
//			$file = $finder->get(storage_path('app/' . $application->transcript_file_name));
//			$response = Response::make($file, 200);
//			$response->header('Content-Type', 'application/pdf');
//			return $response;
//		}
//		else
//		{
//			dd($record_id);
//		}
//	}
//
//    public function deanScholarshipAcceptanceLetter($record_id)
//    {
//        $application = ScholarshipApplicationDean::find($record_id);
//        $finder = new File();
//        if ($finder->isFile(storage_path('app/' . $application->accept_letter_file_name)))
//        {
//            $file = $finder->get(storage_path('app/' . $application->accept_letter_file_name));
//            $response = Response::make($file, 200);
//            $response->header('Content-Type', 'application/pdf');
//            return $response;
//        }
//        else
//        {
//            dd($record_id);
//        }
//	}

	public function generateAndSavePDF($view, $data = [], $path, $filename)
	{
		$pdf = PDF::loadView($view, $data);
		if($pdf->save(storage_path('app/'. $path) . '/' . $filename))
		{
			return TRUE;
		}

		return FALSE;
	}


    public function mergeAndSavePDFs($files, $path)
    {
        if(!empty($files))
        {
            $pdf = new PDFManage();
            $filename = '';
            foreach($files as $file)
            {

                $pdf->addPDF(realpath(storage_path('app') . DIRECTORY_SEPARATOR . $file));
                $filename .= $file;
            }

            $filename = md5($filename) . '.pdf';
            $file_location = storage_path('app' . DIRECTORY_SEPARATOR . $path) . DIRECTORY_SEPARATOR . $filename;



            if($pdf->merge('file', $file_location))
            {
                return $path . DIRECTORY_SEPARATOR . $filename;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return 'no files to merge';
        }

	}


}
