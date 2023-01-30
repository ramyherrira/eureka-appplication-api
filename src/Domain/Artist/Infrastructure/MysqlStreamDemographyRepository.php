<?php

namespace Application\Domain\Artist\Infrastructure;

use Application\Domain\Artist\Entity\Demographics;
use Application\Domain\Artist\Repository\StreamDemographyRepository;
use PDO;

class MysqlStreamDemographyRepository implements StreamDemographyRepository
{
    protected PDO $connection;

    public function __construct()
    {
        // @todo Encapsulate & inject it instead
        $this->connection = new PDO('mysql:host=0.0.0.0;dbname=deezer_for_creators;charset=utf8mb4',
            'ramy',
            'ramy'
        );
    }

    /**
     * @param int $artistID
     * @param string $start
     * @param string $end
     * @return Demographics
     */
    public function getByArtist(
        int               $artistID,
        string $start,
        string $end
    ): Demographics
    {
        $statement = $this->connection->prepare(
            "SELECT gender, sum(stream_count) as stream_count " .
            "FROM stream_demographics " .
            "WHERE artist_id = :artist " .
            "AND recorded_at >= :start " .
            "AND recorded_at <= :end " .
            "GROUP BY gender;"
        );
        $statement->execute([
            'artist' => $artistID,
            'start' => $start,
            'end' => $end,
        ]);

        $result = array_reduce($statement->fetchAll(), function ($acc, $row) {
            $acc[$row['gender']] = $row['stream_count'];

            return $acc;
        }, []);

        if (empty($result)) {
            return new Demographics(
                $start,
                $end,
                0,
                0,
            );
        }

        return new Demographics(
            $start,
            $end,
            $result['F'],
            $result['M'],
        );
    }
}