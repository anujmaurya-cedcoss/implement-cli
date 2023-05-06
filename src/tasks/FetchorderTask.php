<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class FetchorderTask extends Task
{
    public function mainAction()
    {
        echo "Today's orders are : " . PHP_EOL;
        $date = date("Y-m-d");
        $orders = $this->db->fetchAll(
            "SELECT * FROM `order` WHERE `order_date` = '$date'",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );
        print_r($orders);
    }
}
