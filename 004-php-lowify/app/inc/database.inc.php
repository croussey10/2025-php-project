<?php

class DatabaseManager
{
    private $pdo;

    public function __construct(string $dsn, string $username = '', string $password = '')
    {
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->executeQuery("SELECT 1");
        } catch (PDOException $e) {
            throw new PDOException("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * Exécute une requête SQL de type SELECT avec des paramètres nommés.
     * @param string $query La requête SQL à exécuter.
     * @param array $params Les paramètres nommés à lier à la requête.
     * @return array Un tableau 2D des résultats.
     * @throws PDOException Si une erreur survient lors de l'exécution de la requête.
     */
    public function executeQuery(string $query, array $params = []): array
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    /**
     * Exécute une requête SQL de type UPDATE/INSERT/DELETE avec des paramètres nommés.
     * @param string $query La requête SQL à exécuter.
     * @param array $params Les paramètres nommés à lier à la requête.
     * @return int Le nombre de lignes affectées.
     * @throws PDOException Si une erreur survient lors de l'exécution de la requête.
     */
    public function executeUpdate(string $query, array $params = []): int
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
