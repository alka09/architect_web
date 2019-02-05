<?php
declare(strict_types = 1);

namespace Framework\Command;


use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\Config\FileLocator;
use Throwable;


class RegisterConfigs implements CommandInterface
{

    /**@param array $params * @return array*/

    public function execute(array $params): array
    {
        try {
            $fileLocator = new FileLocator($params['dir'] . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($params['containerBuilder'], $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }

        return $params;
    }
}