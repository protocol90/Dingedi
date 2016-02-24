<?php

class Database
{

    static function select($table, $where = 'all', $options = '')
    {
        global $db;

        $sql = 'SELECT * FROM ';
        $sql .= $table;

        if (is_array($where)) {
            $sql .= ' WHERE ';
            foreach ($where as $w => $k) {
                $sql .= ' '.$w . " = '" . $k . "' AND";
            }
            $sql = substr($sql, 0, -3);
            $sql .= " " . $options;
        }
        return $db->query($sql);
    }

    static function delete($table, $where = 'all')
    {
        global $db;

        $sql = 'DELETE FROM ';
        $sql .= $table;

        if (is_array($where)) {
            $sql .= ' WHERE ';
            foreach ($where as $w => $k) {
                $sql .= $w . " = '" . $k . "'";
            }
        }

        return $db->query($sql);
    }

    static function update($table, $options = [], $where = [])
    {
        global $db;

        $sql = "UPDATE $table SET ";
        $queryOptions = '';

        foreach ($options as $option => $v) {
            $queryOptions .= $option . '="' . $v . '" ,';
        }

        $queryOptions = substr($queryOptions, 0, -1);

        $queryWhereOptions = " WHERE ";

        foreach ($where as $w => $k) {
            $queryWhereOptions .= $w . " = '" . $k . "'";
        }

        $sql .= $queryOptions . $queryWhereOptions;

        return $db->query($sql);
    }

    static function insert($table, $options = [])
    {
        global $db;

        $sql = "INSERT INTO $table ";

        $columnName = " ( ";
        $values = " ( ";

        foreach ($options as $option => $v) {
            $columnName .= "$option,";
            $values .= "'$v',";
        }
        $columnName = substr($columnName, 0, -1);
        $values = substr($values, 0, -1);
        $columnName .= " ) ";
        $values .= " ) ";

        $sql = $sql . $columnName . " VALUES " . $values;

        return $db->query($sql);
    }
}