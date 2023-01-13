<?php

class create_messages_table
{
    /**
     * @return void
     */
    public function up(PDO $connection)
    {
        $connection->exec("CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    /**
     * @return void
     */
    public function down(PDO $connection)
    {
        $connection->exec("DROP TABLE IF EXISTS messages");
    }
}
