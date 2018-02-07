<?php

namespace Newsletter2Go\Controllers;

use Newsletter2Go\Helpers\CallbackConfig;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;

class CallbackController extends Controller
{

    public function callback(Request $request)
    {
        $companyId = $request->get('company_id');
        if(isset($companyId)){
            $callbackConfig = new CallbackConfig();
            $callbackConfig->set('newsletter2go.company_id', $companyId);

            return ['success' => true, 'message' => 'OK'];
        } else {

            return ['success' => false, 'message' => 'Missing parameter company_id.'];
        }
    }
}