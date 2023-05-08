<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Acl\Adapter\Memory;
use Phalcon\Cli\Task;


class AclTask extends Task
{
    public function mainAction()
    {
        $folder = BASE_PATH . 'data/storage/ph-strm/a';
        $dh = opendir($folder);
        echo 'cache will be removed from here' . PHP_EOL;
        while (($file = readdir($dh)) !== false) {
            if (!preg_match('/^[.]/', $file)) { // do some sort of filtering on files
                $path = $folder . DIRECTORY_SEPARATOR . $file;
                unlink($path); // remove it
            }
        }
    }
    public function createAction()
    {
        $acl = new Memory();

        $acl->addRole('admin');
        $acl->addRole('user');

        $acl->addComponent(
            'index',
            [
                'index'
            ]
        );

        $acl->addComponent(
            'setting',
            [
                'index',
            ]
        );

        $acl->allow('admin', '*', '*');
        $acl->allow('user', 'index', '*');

        $this->cache->set('acl', serialize($acl));
    }
}
