<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:44 PM
 */

namespace core;


class Mysql
{

    /**
     * @var \mysqli
     */
    private $dbConnection;

    /**
     * UserService constructor.
     * @param $dConnection
     */
    public function __construct()
    {
        $this->dbConnection = mysqli_connect("db", "admin", "admin", "test_db");
    }

    public function query_array($sql)
    {
        $res = mysqli_query($this->dbConnection, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row;
        }
        return $rows;
    }
}