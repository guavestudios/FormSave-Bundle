<?php

declare(strict_types=1);

namespace Guave\FormSaveBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\StringUtil;
use Doctrine\DBAL\Connection;
use Guave\FormSaveBundle\Model\FormSaveModel;

class FormDataMigration extends AbstractMigration
{
    private Connection $connection;
    private string $table;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->table = FormSaveModel::getTable();
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        // If the database table itself does not exist we should do nothing
        if (!$schemaManager->tablesExist([$this->table])) {
            return false;
        }

        $columns = $schemaManager->listTableColumns($this->table);

        return isset($columns['first_name'], $columns['last_name'], $columns['email'], $columns['form_data']);
    }

    public function run(): MigrationResult
    {
        $results = $this->connection->executeQuery('SELECT * FROM '.$this->table)->fetchAllAssociative();

        if (\count($results) < 1) {
            return $this->createResult(
                false,
                'No data sets found in tl_form_save table.'
            );
        }

        foreach ($results as $result) {
            $formData = StringUtil::deserialize($result['form_data']);
            $formData['first_name'] = $formData['first_name'] ?? $result['first_name'];
            $formData['last_name'] = $formData['last_name'] ?? $result['last_name'];
            $formData['email'] = $formData['email'] ?? $result['email'];
            $formData = serialize($formData);

            $this->connection
                ->prepare('UPDATE '.$this->table.' SET form_data = :form_data WHERE id = :id')
                ->executeStatement([
                    'id' => $result['id'],
                    'form_data' => $formData,
                ])
            ;
        }

        $this->connection->executeStatement('ALTER TABLE '.$this->table.' DROP COLUMN first_name, DROP COLUMN last_name, DROP COLUMN email');

        return $this->createResult(
            true,
            'Updated tl_form_save table.'
        );
    }
}
