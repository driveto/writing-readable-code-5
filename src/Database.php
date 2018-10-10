<?php


namespace App;


class Database
{
    /** @var string */
    private $host;

    /** @var string  */
    private $username;

    /** @var string  */
    private $password;

    /** @var string  */
    private $database;

    /** @var \PDO */
    private $pdo;

    public function __construct(
        string $host,
        string $username,
        string $password,
        string $database
    )
    {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->host = $host;
    }

    public function connect(): void
    {
        $this->pdo = new \PDO(
            sprintf("mysql:host=%s;dbname=%s", $this->host, $this->database),
            $this->username,
            $this->password
        );
    }

    public function select(string $sql, array $parameters = []): array {
        $statement = $this->pdo->prepare($sql);

        $statement->execute($parameters);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

}