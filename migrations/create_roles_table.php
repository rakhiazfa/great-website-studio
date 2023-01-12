<?php

class create_roles_table
{
    /**
     * @return void
     */
    public function up(PDO $connection)
    {
        $connection->exec("CREATE TABLE IF NOT EXISTS roles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    /**
     * @return void
     */
    public function down(PDO $connection)
    {
        $connection->exec("DROP TABLE IF EXISTS roles");
    }
}
