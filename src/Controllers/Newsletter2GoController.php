<?php

namespace Newsletter2Go\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract;
use Plenty\Plugin\Http\Request;

class Newsletter2GoController extends Controller
{
    public function test(Twig $twig)
    {
        return $twig->render('Newsletter2Go::content.hello');
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
        $contacts = $contactRepository->getContactList();

        return $contacts;
    }
}
