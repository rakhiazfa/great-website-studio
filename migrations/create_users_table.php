<?php

class create_users_table
{
    /**
     * @return void
     */
    public function up(PDO $connection)
    {
        $connection->exec("CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            CONSTRAINT `role_id_fk` FOREIGN KEY (role_id) REFERENCES roles (id)
        )");
    }

    /**
     * @return void
     */
    public function down(PDO $connection)
    {
        $connection->exec("ALTER TABLE users DROP FOREIGN KEY `role_id_fk`");
        $connection->exec("DROP TABLE IF EXISTS users");
    }
}
