<?php

namespace Kaliop\eZMigrationBundle\API;

use Kaliop\eZMigrationBundle\API\Collection\MigrationCollection;
use Kaliop\eZMigrationBundle\API\Value\MigrationDefinition;
use Kaliop\eZMigrationBundle\API\Value\Migration;

/**
 * Implemented by classes which store details of the executed migrations
 */
interface StorageHandlerInterface
{
    /**
     * @return MigrationCollection sorted from oldest to newest
     */
    public function loadMigrations();

    /**
     * @param string $migrationName
     * @return Migration|null
     */
    public function loadMigration($migrationName);

    /**
     * Starts a migration (stores it)
     * @param MigrationDefinition $migrationDefinition
     * @return Migration
     * @throws \Exception If the migration was already executing
     */
    public function startMigration(MigrationDefinition $migrationDefinition);

    /**
     * Ends a migration (updates it)
     * @param Migration $migration
     * @throws \Exception If the migration was not started
     */
    public function endMigration(Migration $migration);

    /**
     * removes a migration from storage
     * @param Migration $migration
     */
    public function deleteMigration(Migration $migration);
}
