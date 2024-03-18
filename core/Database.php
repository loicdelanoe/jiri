<?php

namespace Core;

use Core\Exceptions\FileNotFoundException;
use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $pdo;
    protected string $table;

    /**
     * @param PDO $pdo
     */
    public function __construct(string $ini_path)
    {
        $this->pdo = $this->getPDO($ini_path);
    }

    public function dropTables(): void
    {
        $query = 'SHOW TABLES';
        $tables = $this->pdo->query($query)->fetchAll();
        foreach ($tables as $table) {
            $this->pdo->exec('DROP TABLE ' . $table->Tables_in_jiri);
        }
    }

    public function exec(string $statement): false|int
    {
        return $this->pdo->exec($statement);
    }

    public function prepare(string $sql_statement): false|PDOStatement
    {
        return $this->pdo->prepare($sql_statement);
    }

    public function query(string $sql_statement): false|PDOStatement
    {
        return $this->pdo->query($sql_statement);
    }

    private function getPDO(string $ini_path): PDO
    {

        if (file_exists($ini_path)) {
            $config = parse_ini_file($ini_path, true);
        } else {
            throw new FileNotFoundException('Il y a un problème de configuration de l’application, contactez l’administration');
        }

        $username = $config['database']['DB_USERNAME'];
        $password = $config['database']['DB_PASSWORD'];

        $dsn = sprintf('%s:host=%s;port=3307;dbname=%s;',
            $config['database']['DB_DRIVER'],
            $config['database']['DB_HOST'],
            $config['database']['DB_NAME']
        );

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            return new PDO($dsn, $username, $password, $options);
        } catch (PDOException $exception) {
            die('Il y a un problème de connection à la base de donnée, contactez un administrateur');
        }
    }

    public function find(string $id): bool|\stdClass
    {
        $statement = $this->prepare(<<<SQL
            SELECT * FROM $this->table
                     WHERE id = :id
            SQL
        );
        $statement->execute([
            'id' => $id,
        ]);
        return $statement->fetch();
    }

    public function findOrFail(string $id): ?\stdClass
    {
        $jiri = $this->find($id);

        if (!$jiri) {
            Response::abort();
        }

        return $jiri;
    }

    public function delete(string $id): bool
    {
        $statement = $this->prepare(<<<SQL
            DELETE FROM $this->table
                     WHERE id = :id
            SQL
        );
        return $statement->execute(['id' => $id,]);
    }

    public function update(string $id): bool
    {
        $statement = $this->prepare(<<<SQL
            DELETE FROM $this->table
                     WHERE id = :id
            SQL
        );
        return $statement->execute(['id' => $id]);
    }

    public function create(array $data)
    {
        $statement = $this->prepare(<<<SQL
            INSERT INTO $this->table (name, starting_at)
                VALUES(:name, :starting_at)
            SQL
        );
        return $statement->execute($data);
    }
}
