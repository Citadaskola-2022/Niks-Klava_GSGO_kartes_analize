<?php

namespace App;

class User
{
    public ?int $id = null;
    public string $username;
    public string $email;
    public string $password;

    public static function get(int $id): self
    {
        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            SELECT * FROM users
            WHERE id = :id
            LIMIT 1;
        SQL);

        $stmt->bindValue(':id', $id);

        $result = $stmt->execute();

        if (!$result) {
            throw new \Exception('User not found');
        }

        $row = $result->fetchArray();

        $user = new self();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->email = $row['email'];
        $user->password = $row['password'];

        return $user;
    }

    public function save(): self
    {
        if (!$this->id) {
            return $this->create();
        }

        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            UPDATE users 
            SET username = :username,
                email = :email,
                password = :password
        SQL);

        $stmt->bindValue(':username', $this->username);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $this->password);

        $stmt->execute();

        return $this;
    }
    
    public function create(): self
    {
        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            INSERT INTO users (username, email, password) VALUES (:username, :email, :password);
        SQL);

        $stmt->bindValue(':username', $this->username);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $this->password);

        $stmt->execute();

        $this->id = \App\Db::getInstance()->lastInsertRowID();

        return $this;
    }

    public static function verify(string $email, string $password): int
    {
        $stmt = \App\Db::getInstance()->prepare(<<<SQL
            SELECT id, password FROM users
            WHERE email = :email
            LIMIT 1;
        SQL);

        $stmt->bindValue(':email', $email);

        $result = $stmt->execute();

        if (!$result) {
            throw new \Exception('User not found');
        }

        $row = $result->fetchArray();

        if (!password_verify($password, $row['password'])) {
            return 0;
        }

        return $row['id'];
    }

    public static function currentUser(): ?self
    {
        if (empty($_SESSION['id']) ?? false) {
            return null;
        }
        return self::get($_SESSION['id']);
    }
}