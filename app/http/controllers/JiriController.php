<?php

namespace App\Http\Controllers;

use App\Models\Jiri;
use Core\Exceptions\FileNotFoundException;
use Core\Response;

class JiriController
{

    private Jiri $jiri;

    public function __construct()
    {
        try {
            $this->jiri = new Jiri(BASE_PATH . '/.env.local.ini');
        } catch (FileNotFoundException $exception) {
            die($exception->getMessage());
        }
    }

    public function index(): void
    {
        $search = $_GET['search'] ?? '';
        $statement = $this->jiri->query(<<<SQL
    SELECT * FROM `jiris`
             WHERE starting_at > CURRENT_TIMESTAMP 
               AND name LIKE '%$search%';
    SQL
        );
        $upcoming_jiris = $statement->fetchAll();

        $statement = $this->jiri->query(<<<SQL
    SELECT * FROM `jiris`
             WHERE starting_at < CURRENT_TIMESTAMP
               AND name LIKE '%$search%';
    SQL
        );
        $passed_jiris = $statement->fetchAll();

        view('jiris.index', compact('upcoming_jiris', 'passed_jiris'));
    }

    public function create(): void
    {
        view('jiris.create');
    }

    public function store(): void
    {
        // Validation
        if (!isset($_POST['name'], $_POST['starting_at'])) {
            Response::abort(Response::BAD_REQUEST);
        }
        // Test data quality

        // Save in DB
//        $this->jiri->create([
//            'name' => $_POST['name'],
//            'starting_at' => $_POST['starting_at'],
//        ]);

        $jiri_insert_statement = $this->jiri->prepare('INSERT INTO jiris (name, starting_at) VALUES(:name, :starting_at)');
        $success = $jiri_insert_statement->execute([
            'name' => $_POST['name'],
            'starting_at' => $_POST['starting_at'],
        ]);

        if ($success) {
            Response::redirect('/jiris');

        } else {
            Response::abort(Response::SERVER_ERROR);
        }
    }

    public function show(): void
    {
        //Get ID
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            Response::abort(Response::BAD_REQUEST);
        }
        $id = $_GET['id'];

        $jiri = $this->jiri->findOrFail($id);

        view('jiris.show', compact('jiri'));

    }

    public function destroy(): void
    {
        if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
            Response::abort(Response::BAD_REQUEST);
        }
        $id = $_POST['id'];

        $this->jiri->delete($id);

        Response::redirect('/jiris');

    }

    public function edit(): void
    {

        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            Response::abort(Response::BAD_REQUEST);
        }

        $id = $_GET['id'];

        $jiri = $this->jiri->findOrFail($id);

        view('jiris.edit', compact('jiri'));
    }

    public function update(): void
    {
        // Save in $this->jiri
        $jiri_insert_statement = $this->jiri->prepare('UPDATE jiris SET name = :name, starting_at = :starting_at WHERE id = :id ');
        $success = $jiri_insert_statement->execute([
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'starting_at' => $_POST['starting_at'],
        ]);

        if ($success) {
            Response::redirect("/jiri?id={$_POST['id']}");

        } else {
            Response::abort(Response::SERVER_ERROR);
        }
    }
}