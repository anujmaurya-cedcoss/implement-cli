<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;

class SettingTask extends Task
{
    public function mainAction($price, $stock)
    {
        $findDB = $this->db->fetchAll(
            "SELECT * FROM `setting`",
            \Phalcon\Db\Enum::FETCH_ASSOC
        );
        if (isset($findDB[0])) {
            $success = $this->db->execute(
                "UPDATE `setting` SET `price`='$price',`stock`='$stock'"
            );
        } else {
            $success = $this->db->execute(
                "INSERT INTO `setting`(`price`, `stock`)
                VALUES ($price, $stock)"
            );
        }
        if ($success) {
            echo "Default setting updated successfully";
        } else {
            echo "Default setting wasn't updated";
        }
    }
}