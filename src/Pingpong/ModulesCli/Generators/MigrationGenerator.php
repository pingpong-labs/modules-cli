<?php namespace Pingpong\ModulesCli\Generators;

use Pingpong\ModulesCli\Exceptions\InvalidMigrationNameException;
use Pingpong\ModulesCli\Schema\Field;
use Pingpong\ModulesCli\Schema\Parser;
use Pingpong\ModulesCli\Stub;

class MigrationGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $migrationName;

    /**
     * @var null|string
     */
    protected $fields;

    /**
     * @var bool
     */
    protected $plain;

    /**
     * @var string
     */
    protected $type = 'migration';

    /**
     * @param string $name
     * @param string $migrationName
     * @param string|null $fields
     * @param bool $plain
     */
    public function __construct($name, $migrationName, $fields = null, $plain = false)
    {
        parent::__construct();

        $this->name = $name;
        $this->migrationName = $migrationName;
        $this->fields = $fields;
        $this->plain = $plain;
    }

    /**
     * Get stub replacements.
     *
     * @return array
     */
    public function getStubReplacements()
    {
        return [];
    }

    /**
     * Get class name.
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->getStudlyName($this->migrationName);
    }

    /**
     * @return Stub
     * @throws InvalidMigrationName
     */
    public function getTemplateContents()
    {
        $schema = new Parser($this->migrationName);

        $fields = new Field($this->fields);

        if ($this->plain)
        {
            return new Stub('migration/plain', [
                'CLASS' => $this->getClassName()
            ]);
        }
        elseif ($schema->isCreate())
        {
            return new Stub('migration/create', [
                'CLASS' => $this->getClassName(),
                'FIELDS' => $fields->getSchemaCreate(),
                'TABLE' => $schema->getTableName()
            ]);
        }
        elseif ($schema->isAdd())
        {
            return new Stub('migration/add', [
                'CLASS' => $this->getClassName(),
                'FIELDS_UP' => $fields->getSchemaCreate(),
                'FIELDS_DOWN' => $fields->getSchemaDropColumn(),
                'TABLE' => $schema->getTableName()
            ]);
        }
        elseif ($schema->isDelete())
        {
            return new Stub('migration/delete', [
                'CLASS' => $this->getClassName(),
                'FIELDS_DOWN' => $fields->getSchemaCreate(),
                'FIELDS_UP' => $fields->getSchemaDropColumn(),
                'TABLE' => $schema->getTableName()
            ]);
        }
        elseif ($schema->isDrop())
        {
            return new Stub('migration/drop', [
                'CLASS' => $this->getClassName(),
                'FIELDS' => $fields->getSchemaCreate(),
                'TABLE' => $schema->getTableName()
            ]);
        }

        throw new InvalidMigrationNameException;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return date('Y_m_d_His_') . $this->migrationName . '.php';
    }


}