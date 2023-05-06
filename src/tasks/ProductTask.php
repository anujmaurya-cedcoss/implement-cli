<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class ProductTask extends Task
{
    public function mainAction()
    {
        echo 'Count of products with quantity less than 10' . PHP_EOL;
        $success = $this->db->fetchAll(
            "SELECT COUNT(*) FROM `product` WHERE `stock` <= 10;"
        );
        echo $success[0]['COUNT(*)'];
    }
}
