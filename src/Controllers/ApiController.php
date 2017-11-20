<?php

namespace Newsletter2Go\Controllers;

use IO\Services\CustomerService;
use Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Http\Request;

class ApiController extends Controller
{
    /**
     * @var string
     */
    protected $transaction;

    /**
     * @var null|Response
     */
    private $response;

    /**
     * @var Response
     */
    private $request;

    /**
     * @var  array
     */
    private $createOrderResult = [];

    public function __construct(
        Response $response,
        Request $request)
    {
        $this->response = $response;
        $this->request = $request;
    }

    /**
     * Retrieves all request params and authenticates user
     *
     * @param Request $request
     * @return array
     *
     */
    public function export(Request $request)
    {
        return 'Test';
    }

    /**
     * Returns all customers on the system
     *
     * @param Request $request
     * @return \Plenty\Repositories\Models\PaginatedResult
     */
    /*public function customers(Request $request)
    {
        $groups = $request->get('groups');*/
        /** @var ContactRepositoryContract $contactRepository */
/*        $contactRepository = pluginApp(ContactRepositoryContract::class);
        $contacts = $contactRepository->getContactList();
        
        return $contacts;
    }*/

    public function checkEmail($email)
    {
        $notAllowed = ['amazon.com'];

        // Make sure the address is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $explodedEmail = explode('@', $email);
            $domain = array_pop($explodedEmail);

            if (in_array($domain, $notAllowed)) {
                // Not allowed
            }
        }
    }
}
