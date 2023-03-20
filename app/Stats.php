<?php

namespace App;

class Stats
{
    public ?int $id = null;
    public string $map;
    public int $kills;
    public int $deaths;
    public string $mvp;
    public int $rounds_won;
    public int $rounds_lost;
    public int $ct_won;
    public int $ct_lost;
    public int $t_won;
    public int $t_lost;
    public int $user_id;


    /**
     * @return \App\Stats[]
     * @throws \Exception
     */
    public static function getArrayByUserId(int $userId): array
    {
        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            SELECT * FROM stats
            WHERE user_id = :user_id
        SQL);

        $stmt->bindValue(':user_id', $userId);

        $result = $stmt->execute();

        if (!$result) {
            throw new \Exception('Stats not found');
        }

        $res = [];
        while ($row = $result->fetchArray()) {
            $stats = new self();
            $stats->id = $row['id'];

            $stats->map = $row['map'];
            $stats->kills = $row['kills'];
            $stats->deaths = $row['deaths'];
            $stats->mvp = $row['mvp'];
            $stats->rounds_won = $row['rounds_won'];
            $stats->rounds_lost = $row['rounds_lost'];
            $stats->ct_won = $row['ct_won'];
            $stats->ct_lost = $row['ct_lost'];
            $stats->t_won = $row['t_won'];
            $stats->t_lost = $row['t_lost'];

            $res[] = $stats;
        }

        return $res;
    }

    public function save(): self
    {
        if (!$this->id) {
            return $this->create();
        }

        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            UPDATE users 
            SET map = :map
                kills = :kills
                deaths = :deaths
                mvp = :mvp
                rounds_win = :rounds_win
                rounds_lost = :rounds_lost
                ct_win = :ct_win
                ct_lost = :ct_lost
                t_won = :t_won
                t_lost = :t_lost
                user_id = :user_id
            WHERE id = :id
        SQL);

        $stmt->bindValue(':id', $this->id);

        $stmt->bindValue(':map', $this->map);
        $stmt->bindValue(':kills', $this->kills);
        $stmt->bindValue(':deaths', $this->deaths);
        $stmt->bindValue(':mvp', $this->mvp);
        $stmt->bindValue(':rounds_won', $this->rounds_won);
        $stmt->bindValue(':rounds_lost', $this->rounds_lost);
        $stmt->bindValue(':ct_won', $this->ct_won);
        $stmt->bindValue(':ct_lost', $this->ct_lost);
        $stmt->bindValue(':ct_won', $this->ct_won);
        $stmt->bindValue(':t_lost', $this->t_lost);
        $stmt->bindValue(':user_id', $this->user_id);

        $stmt->execute();

        return $this;
    }

    public function create(): self
    {
        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            INSERT INTO stats 
                (map, kills, deaths, mvp, rounds_won, rounds_lost, ct_won, ct_lost, t_won, t_lost, user_id) 
            VALUES 
                (:map, :kills, :deaths, :mvp, :rounds_won, :rounds_lost, :ct_won, :ct_lost, :t_won, :t_lost, :user_id)
        SQL);

        $stmt->bindValue(':map', $this->map);
        $stmt->bindValue(':kills', $this->kills);
        $stmt->bindValue(':deaths', $this->deaths);
        $stmt->bindValue(':mvp', $this->mvp);
        $stmt->bindValue(':rounds_won', $this->rounds_won);
        $stmt->bindValue(':rounds_lost', $this->rounds_lost);
        $stmt->bindValue(':ct_won', $this->ct_won);
        $stmt->bindValue(':ct_lost', $this->ct_lost);
        $stmt->bindValue(':t_won', $this->t_won);
        $stmt->bindValue(':t_lost', $this->t_lost);
        $stmt->bindValue(':user_id', $this->user_id);

        $stmt->execute();

        $this->id = \App\Db::getInstance()->lastInsertRowID();

        return $this;
    }
}