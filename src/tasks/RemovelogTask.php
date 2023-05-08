<?php

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class RemovelogTask extends Task
{
    public function mainAction()
    {
        $folder = BASE_PATH . 'tasks/logs/';
        $dh = opendir($folder);
        echo 'logs will be removed from here' . PHP_EOL;
        while (($file = readdir($dh)) !== false) {
            if (!preg_match('/^[.]/', $file)) { // do some sort of filtering on files
                $path = $folder . DIRECTORY_SEPARATOR . $file;
                unlink($path); // remove it
            }
        }
    }
}
