<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 7/12/17
 * Time: 15:12
 */

namespace app\Helpers;

use App\Models\WarnedCountry;

class TravelWarning
{

	public static function getWarnings()
	{
		//to stop warnings that will interrupt the process
		libxml_use_internal_errors(true);
		$url = 'https://travel.state.gov/content/passports/en/alertswarnings.html';
		$dom = new \DOMDocument();
		@$dom->loadHTMLFile($url);
		$tbody = $dom->getElementsByTagName('tbody')->item(0);
		$warning_list = [];
		foreach ($tbody->childNodes as $tr)
		{
			$row = [];
			$row['type'] = $tr->childNodes->item(0)->nodeValue;
			$row['date'] = date('Y-m-d', strtotime($tr->childNodes->item(1)->nodeValue));
			$row['country'] = explode(' ', $tr->childNodes->item(2)->nodeValue)[0];
			array_push($warning_list, $row);
		}

		return $warning_list;
	}

	public static function truncateAndRefillWarnedCountry()
	{
		WarnedCountry::truncate();
		$warnings = self::getWarnings();
		foreach ($warnings as $w)
		{
			WarnedCountry::create($w);
		}
	}

	/**
	 * check if the warned_countries table is out of date
	 * if so, then retrieve data and refill the table
	 * so that the table can keep updated on a daily basis.
	 * every internship application create action will trigger this. though its kinda silly, but it works.
	 */
	public static function updateIfOutOfDate()
	{
		$a_record = WarnedCountry::first();
		if(is_null($a_record))
        {
            self::truncateAndRefillWarnedCountry();
        }
        else
        {
            date_default_timezone_set('America/New_York');
            $now = date('Y-m-d');
            $last_update = date('Y-m-d', strtotime($a_record->created_at));

            if($now > $last_update)
            {
                self::truncateAndRefillWarnedCountry();
            }
        }

	}
}