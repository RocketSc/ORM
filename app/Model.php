<?php

namespace App;

use PDO;

abstract class Model implements ModelInterface
{
    public function load(int $id): Model
    {
        $db = Database::getConnection();

        //This will lead to an error if class name is ending with -y
        //Getting class name without namespace
        $arrayWithNameSpaces = explode('\\', strtolower(get_class($this)));
        $tableName = array_pop($arrayWithNameSpaces) . 's';

        var_dump($tableName, $id);

        $stmt = 'SELECT * '
              . 'FROM ' . $tableName . ' '
              . 'WHERE id = :id';

        $result= $db->prepare($stmt);


        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        foreach ($row as $column => $value) {
            $this->$column = $value;
        }

        return $this;

    }

    public function save(Model $model): boolean
    {
        // TODO: Implement save() method.
    }

    public function update(Model $model): boolean
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id): boolean
    {
        // TODO: Implement destroy() method.
    }
}