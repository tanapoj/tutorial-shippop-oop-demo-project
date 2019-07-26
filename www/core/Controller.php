<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:28 PM
 */

namespace core;


class Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * Controller constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


}