<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipDeanRecommendationPortal;
use Illuminate\Http\Request;

class ScholarshipDeanRecommendationPortalController extends Controller
{
    public function identityCheckView($random_url)
    {
        $portal = new ScholarshipDeanRecommendationPortal();

        $exist = $portal->where('random_url', $random_url)->exists();

        if(!$exist)
        {
            return view('frontend.url_not_exist');
        }

        $answer = $portal->getIdentityCheckData($random_url);


        return 'still woking on this';


    }
}
