<?php

namespace App\Http\Controllers;

use Core\Database;
use Core\Exceptions\FileNotFoundException;

class JiriController
{

    private Database $db;

    public function __construct()
    {
        try {
            $this->db = new Database(BASE_PATH . '/.env.local.ini');
        } catch (FileNotFoundException $exception) {
            die($exception->getMessage());
        }
    }

    public function index()
    {
        $search = $_GET['search'] ?? '';
        $statement = $this->db->query(<<<SQL
    SELECT * FROM `jiris`
             WHERE starting_at > CURRENT_TIMESTAMP 
               AND name LIKE '%$search%';
    SQL);
        $upcoming_jiris = $statement->fetchAll();

        $statement = $this->db->query(<<<SQL
    SELECT * FROM `jiris`
             WHERE starting_at < CURRENT_TIMESTAMP
               AND name LIKE '%$search%';
    SQL);
        $passed_jiris = $statement->fetchAll();

        view('jiris.index', compact('upcoming_jiris', 'passed_jiris'));
    }
}