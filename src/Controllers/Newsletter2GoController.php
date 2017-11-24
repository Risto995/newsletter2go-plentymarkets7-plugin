<?php

namespace Newsletter2Go\Controllers;

use Plenty\Modules\Account\Contact\Contracts\ContactClassRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract;
use Plenty\Plugin\Http\Request;
use Plenty\Repositories\Models\PaginatedResult;

class Newsletter2GoController extends Controller
{
    private $version = 1.0;

    /**
     * @return bool
     */
    public function test()
    {
        $response['test'] = true;
        $response['success'] = true;
        return $response;
    }

    /**
     * @param Request $request
     * @return float
     */
    public function version(Request $request)
    {
        $response['data'] = $this->version;
        $response['success'] = true;
        return $response;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function customerCount(Request $request)
    {
        /** @var ContactRepositoryContract $contactRepository */
        $contactRepository = pluginApp(ContactRepositoryContract::class);
        $contacts = $contactRepository->getContactList()->getResult();

        $response['data'] = count($contacts);
        $response['success'] = true;

        return $response;
    }

    /**
     * Returns all customers on the system
     *
     * @param Request $request
     * @return \Plenty\Repositories\Models\PaginatedResult
     */
    public function customers(Request $request)
    {
        $newsletterSubscribersOnly = filter_var($request->get('newsletterSubscribersOnly', false),
            FILTER_VALIDATE_BOOLEAN);
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 50);
        $hours = $request->get('hours', null);
        $fields = $request->get('fields', 'id,firstName,lastName,newsletterAllowanceAt,classId,updatedAt');
        $fields = explode(",", $fields);
        $groups = explode(",", $request->get('groups', null));
        /** @var ContactRepositoryContract $contactRepository */
        $contactRepository = pluginApp(ContactRepositoryContract::class);
        $contacts = $contactRepository->getContactList([], [], $fields, $page, $limit)->getResult();
        $filteredContacts = [];
        $hoursContacts = [];

        foreach ($contacts as $contact) {
            if ($this->checkEmail($contact['email'])) {
                if ($newsletterSubscribersOnly && $contact['newsletterAllowanceAt'] != null) {
                    if ($groups != null && in_array($contact['classId'],$groups)) {
                        array_push($filteredContacts, $contact);
                    }
                    if ($groups == null) {
                        array_push($filteredContacts, $contact);
                    }
                }

                if (!$newsletterSubscribersOnly) {
                    if ($groups != null && in_array($contact['classId'],$groups)) {
                        array_push($filteredContacts, $contact);
                    }
                    if ($groups == null) {
                        array_push($filteredContacts, $contact);
                    }
                }
            }
        }

        /*if($hours != null){
            foreach ($filteredContacts as $contact){
                $timestamp = date('m-d g:Ga', strtotime($contact['updatedAt'])-$hours*3600);
            }
        }*/

        $timestamp = date('m-d g:Ga', strtotime('-6 hours', strtotime("2017-11-22T15:09:42+00:00")));

        if ($timestamp < strtotime("2017-11-22T15:09:42+00:00")){
            return $response['test'] = true;
        } else {
            return $response['test'] = false;
        }
    }

    public function checkEmail($email)
    {
        $notAllowed = ['amazon.com'];

        // Make sure the address is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $explodedEmail = explode('@', $email);
            $domain = array_pop($explodedEmail);

            if (in_array($domain, $notAllowed)) {
                return false;
            }

            return true;
        }

        return false;
    }
}
