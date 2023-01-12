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

class Migration
{
    /**
     * @var PDO
     */
    private static PDO $connection;

    /**
     * Setup migration.
     * 
     * @return void
     */
    public static function setup()
    {
        /**
         * Create migration table.
         * 
         */

        self::$connection->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB");
    }

    /**
     * Run migration.
     * 
     * @return void
     */
    public static function migrate()
    {
        $migrations = self::getMigrations();

        $migrationFiles = scandir(GWS_ROOT_DIRECTORY . '/migrations');

        $filesToBeMigration = array_diff($migrationFiles, $migrations);

        $newMigrations = [];

        foreach ($filesToBeMigration as $toBeMigration) {

            if ($toBeMigration === '.' || $toBeMigration === '..') {

                continue;
            }

            if (!file_exists(GWS_ROOT_DIRECTORY . '/migrations/' . $toBeMigration)) {

                continue;
            }

            require_once GWS_ROOT_DIRECTORY . '/migrations/' . $toBeMigration;

            $className = pathinfo($toBeMigration, PATHINFO_FILENAME);

            $instance = new $className();

            echo "\n\033[97m [$toBeMigration] Run the migration file . . .\n";

            $instance->up(self::$connection);

            echo "\n\033[32m [$toBeMigration] Migration was successfully . . .\n";

            $newMigrations[] = $toBeMigration;
        }

        if (!empty($newMigrations)) {

            self::saveMigrations($newMigrations);
        } else {

            echo "\n\033[32m All migrations runned successfully.\n";
        }
    }

    /**
     * Restore migration. 
     * 
     * @return void
     */
    public static function restore()
    {
        $migrationFiles = self::getMigrations();

        $migrationsToBeDeleted = [];

        foreach ($migrationFiles as $migration) {

            if ($migration === '.' || $migration === '..') {

                continue;
            }

            if (!file_exists(GWS_ROOT_DIRECTORY . '/migrations/' . $migration)) {

                continue;
            }

            require_once GWS_ROOT_DIRECTORY . '/migrations/' . $migration;

            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className();

            echo "\n\033[97m [$migration] Restoring migration . . .\n";

            $instance->down(self::$connection);

            echo "\n\033[32m [$migration] Successfully restored the migration . . .\n";

            $migrationsToBeDeleted[] = $migration;
        }

        if (!empty($migrationsToBeDeleted)) {

            self::deleteMigrations($migrationsToBeDeleted);
        } else {

            echo "\n\033[32m All migrations were restored successfully.\n";
        }
    }

    /**
     * Save a new migrations.
     * 
     * @param array $migrations
     * 
     * @return void
     */
    public static function saveMigrations(array $migrations = [])
    {
        $migrations = implode(', ', array_map(fn ($migration) => "( '$migration' )", $migrations));

        $statement = self::$connection->prepare("INSERT INTO migrations ( migration ) VALUES $migrations");

        $statement->execute();
    }

    /**
     * Delete migrations.
     * 
     * @param array $migrations
     * 
     * @return void
     */
    public static function deleteMigrations(array $migrations = [])
    {
        $migrations = '( ' . implode(', ', array_map(fn ($migration) => "'$migration'", $migrations)) . ' )';

        $statement = self::$connection->prepare("DELETE FROM migrations WHERE migration IN $migrations");

        $statement->execute();
    }

    /**
     * Set database connection.
     * 
     * @param PDO $connection
     * 
     * @return void
     */
    public static function setConnection(PDO $connection)
    {

        self::$connection = $connection;
    }

    /**
     * Get migrations.
     * 
     * @return array
     */
    public static function getMigrations()
    {
        $statement = self::$connection->prepare("SELECT migration FROM migrations");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
}
