<?php
/**
 * Created by PhpStorm.
 * User: parhomenkoav
 * Date: 03.06.2016
 * Time: 15:03
 */

namespace systems {

    use PDO;

    class DB
    {
        public $dBase;
        protected static $instance;

        private function __construct($setDb = null)
        {
            if (!$setDb) $setDb = DBCONN;
            try {
                $this->dBase = new PDO($setDb, "root", "");

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public static function getInstance(){
            if (!self::$instance) self::$instance = new self();
            return self::$instance;
        }

        function select($table, $what, $where = null, $orderColumn = null, $desc = null, $limit = null)
        {

            $array = [];

            if ($what) {
                $fields = "`" . implode("`,`", $what) . "`";
                $fields = preg_replace("/`COUNT\((.*)\)`/i", "COUNT(*) AS `count`", $fields);
                //echo $fields;
            } else {
                $fields = "*";
            }

            if ($where) {
                $and = "";
                foreach ($where as $key => $value) {
                    $condition .= $and . "`$key` = ? ";
                    $values[] = $value;
                    $and = " AND ";
                }
            } else {
                $condition = " 1 ";
            }

            if ($orderColumn) {
                $order = "ORDER BY `$orderColumn` " . $desc;
            } else {
                $order = "";
            }


            if ($limit) {
                $lim = "LIMIT " . $limit[0] . " , " . ($limit[1] - $limit[10]);
            } else {
                $lim = "LIMIT 30";
            }

            $sql = "SELECT $fields FROM `$table` WHERE $condition $order $lim";

            //echo $sql;

            $query = $this->dBase->prepare($sql);
            $query->execute($values);
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        }

        function sendQuery($sql)
        {
            $query = $this->dBase->prepare($sql);
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        }

        function delete($table, $where)
        {

            if ($where) {
                $and = "";
                foreach ($where as $key => $value) {
                    $condition .= $and . "`$key` = ? ";
                    $values[] = $value;
                    $and = " AND ";
                }
            } else {
                $condition = " 0 ";
            }
            $sql = "DELETE FROM `$table` WHERE $condition";
            $query = $this->dBase->prepare($sql);
            return $query->execute($values);
        }


        function insert($table, $col_data)
        {

            $comma = "";
            foreach ($col_data as $key => $value) {
                $col .= $comma . "`$key`";
                $data .= $comma . "? ";
                $values[] = $value;
                $comma = " , ";
            }

            $sql = "INSERT INTO `$table` ($col) VALUES ($data)";

            $query = $this->dBase->prepare($sql);
            $answer = $query->execute($values);

            if ($answer) {
                return $this->dBase->lastInsertId();
            } else {
                return $answer;
            }
        }

        function update($table, $where, $col_data)
        {

            $comma = "";
            foreach ($col_data as $key => $value) {
                $field_data .= $comma . "`$key` = ? ";
                $values[] = $value;
                $comma = " , ";
            }
            if ($where) {
                $and = "";
                foreach ($where as $key => $value) {
                    $condition .= $and . "`$key` = ? ";
                    $values[] = $value;
                    $and = " AND ";
                }
            } else {
                $condition = " 1 ";
            }
            $sql = "UPDATE `$table` SET $field_data WHERE $condition";
            $query = $this->dBase->prepare($sql);
            return $query->execute($values);
        }


    }
}