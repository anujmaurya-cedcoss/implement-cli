<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class AclTask extends Task
{
    public function mainAction()
    {
        $folder = BASE_PATH . 'data/storage/ph-strm/na';
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
        $di = $this->getDI();
        $di->get('cache')->set('name', 'Anuj');
        echo 'hello world' . PHP_EOL;
    }

}