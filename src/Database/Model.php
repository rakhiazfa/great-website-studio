<?php

namespace GreatWebsiteStudio\Database;

use PDO;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Model extends Database
{


    /**
     * @var string
     */
    protected string $table;

    /**
     * @var array
     */
    protected array $attributes;

    /**
     * Retrieve all data.
     * 
     * @return array
     */
    public function all()
    {
        $statement = $this->connection->query("SELECT * FROM $this->table");

        return $statement->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

    /**
     * Create a new data row.
     * 
     * @param array $attributes
     * 
     * @return bool|int
     */
    public function create(array $attributes = [])
    {
        $registeredAttributes = [];

        /**
         * Check if attribute is registered.
         */

        foreach ($attributes as $key => $value) {

            if (in_array($key, $this->attributes)) {

                array_push($registeredAttributes, $key);
            }
        }

        $params = implode(', ', $registeredAttributes);

        $values = implode(', ', array_map(fn ($attribute) => ":$attribute", $registeredAttributes));

        /**
         * Initialize statement.
         * 
         */

        $statement = $this->connection->prepare("INSERT INTO $this->table ( $params ) VALUES ( $values )");

        foreach ($registeredAttributes as $attribute) {

            $statement->bindParam($key, $attributes[$attribute], $this->checkType($attributes[$attribute]));
        }

        /**
         * Execute statement.
         * 
         */

        $statement->execute();

        return $statement->rowCount();
    }

    /**
     * Update data row.
     * 
     * @param int $id
     * @param array $attributes
     * 
     * @return bool|int
     */
    public function update(int $id, array $attributes = [])
    {
        $registeredAttributes = [];

        /**
         * Check if attribute is registered.
         */

        foreach ($attributes as $key => $value) {

            if (in_array($key, $this->attributes)) {

                array_push($registeredAttributes, $key);
            }
        }

        $sets = implode(', ', array_map(fn ($attribute) => "$attribute = :$attribute", $registeredAttributes));

        /**
         * Initialize statement.
         * 
         */

        $statement = $this->connection->prepare("UPDATE $this->table SET $sets WHERE id = :id");

        foreach ($registeredAttributes as $attribute) {

            $statement->bindParam($key, $attributes[$attribute], $this->checkType($attributes[$attribute]));
        }

        $statement->bindParam('id', $id, PDO::PARAM_INT);

        /**
         * Execute statement.
         * 
         */

        $statement->execute();

        return $statement->rowCount();
    }

    /**
     * Delete data row.
     * 
     * @param int $id
     * 
     * @return bool|int
     */
    public function delete(int $id)
    {
        /**
         * Initialize statement.
         * 
         */

        $statement = $this->connection->prepare("DELETE FROM $this->table WHERE id = :id");

        $statement->bindParam('id', $id, PDO::PARAM_INT);

        /**
         * Execute statement.
         * 
         */

        $statement->execute();

        return $statement->rowCount();
    }

    /**
     * Check data type.
     * 
     * @param mixed $value
     * 
     * @return mixed
     */
    private function checkType(mixed $value)
    {
        switch (gettype($value)) {
            case 'boolean':
                return PDO::PARAM_BOOL;
            case 'integer':
                return PDO::PARAM_INT;
            case 'NULL':
                return PDO::PARAM_NULL;
            default:
                return PDO::PARAM_STR;
        }
    }
}
