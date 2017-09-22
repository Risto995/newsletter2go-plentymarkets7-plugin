<?php

namespace Newsletter2Go\Models;

use Plenty\Plugin\Application;

class ExportModel
{
    /**
     * @var Application
     */
    private $app;

    /**
     * ExportModel constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}
