<?php

namespace Sportic\Waiver\Tests;

use Bytic\Phpqa\PHPUnit\TestCase;
use Sportic\Waiver\WaiverServiceProvider;
use Mockery;
use Nip\Config\Config;
use Nip\Container\Utility\Container;

/**
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{

    protected function loadConfig($data = [])
    {
        $config = config();
        $configNew = new Config([WaiverServiceProvider::NAME => $data], true);
        $this->getContainer()->set('config', $config->merge($configNew));
    }

    protected function loadConfigFromFixture($name)
    {
        $config = require TEST_FIXTURE_PATH . '/config/' . $name . '.php';
        $this->loadConfig($config);
    }

    protected function loadServiceProvider(): WaiverServiceProvider
    {
        $container = $this->getContainer();
        $provider = new WaiverServiceProvider();
        $provider->setContainer($container);
        $provider->register();
        return $provider;
    }

    protected function loadFakeTranslator()
    {
        $translator = Mockery::mock('translator');
        $translator->shouldReceive('trans')->andReturnArg(0);

        $container = $this->getContainer();
        $container->set('translator', $translator);
    }

    protected function getContainer(): \Psr\Container\ContainerInterface|\Nip\Container\Container|bool
    {
        return Container::container();
    }
}
