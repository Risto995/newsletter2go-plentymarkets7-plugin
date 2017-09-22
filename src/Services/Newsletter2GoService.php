<?php

namespace Newsletter2Go\Services;

use Plenty\Plugin\Application;
use Plenty\Modules\System\Models\WebstoreConfiguration;
use Plenty\Modules\System\Contracts\WebstoreConfigurationRepositoryContract;

class Newsletter2GoService
{
    private $shopUrl;

    public function getShopUrl()
    {
        if ($this->shopUrl === null) {
            $this->shopUrl = $this->getWebStoreConfig()->domainSsl;
        }

        return $this->shopUrl;
    }

    /**
     * @fixme This method is completely wrong... and worse I've no idea what it's supposed to do.
     */
    public function getTemplate() {
        /**
         * @see https://github.com/plentymarkets/plugin-io/blob/master/src/Helper/TemplateContainer.php
         * @var TemplateContainer $templateContainer
         */
        $templateContainer = pluginApp(TemplateContainer::class);
        $storeConf = $templateContainer->getTemplate();
        return $storeConf['domainSsl'];
    }

    /**
     * @return WebstoreConfiguration
     */
    private function getWebStoreConfig()
    {
        /** @var Application $app */
        $app = pluginApp(Application::class);
        /** @var WebstoreConfigurationRepositoryContract $repo */
        $repo = pluginApp(WebstoreConfigurationRepositoryContract::class);

        return $repo->findByPlentyId($app->getPlentyId());
    }
}
