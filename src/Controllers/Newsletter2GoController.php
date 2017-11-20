<?php

namespace Newsletter2Go\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract;
use Plenty\Plugin\Http\Request;
use Plenty\Repositories\Models\PaginatedResult;

class Newsletter2GoController extends Controller
{
    public function test(Twig $twig)
    {
        /** @var ContactRepositoryContract $contactRepository */
        $contactRepository = pluginApp(ContactRepositoryContract::class);
        $contacts = $contactRepository->getContactList();

        return $contacts;
    }

    /**
     * Returns all customers on the system
     *
     * @param Request $request
     * @return \Plenty\Repositories\Models\PaginatedResult
     */
    public function customers(Request $request)
    {
        /** @var ContactRepositoryContract $contactRepository */
        $contactRepository = pluginApp(ContactRepositoryContract::class);
        $contacts = $contactRepository->getContactList()->toArray();
        $filteredContacts = [];

        foreach ($contacts as $contact){
            if($this->checkEmail($contact['email'])){
               array_push($filteredContacts, $contact);
            }
        }

        return $contacts;
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
