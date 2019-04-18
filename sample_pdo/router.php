<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function ($request, $response, $args) {
    $data['key'] = 'val';
    return $this->tpl->render($response, 'home.php', $data);
});

$app->get('/films', function ($request, $response, $args){
    $data['site_title'] = 'List Film :: Aplikasi Rental';
    $sql = 'select film_id, title, release_year, name, rental_rate, length, rating 
            from film join language on (film.language_id = language.language_id)';
    $stmt = $this->pdo->prepare($sql);
	$stmt->execute();
	$data['films'] = $stmt->fetchAll();
    return $this->tpl->render($response, 'film-list.php', $data);
});

$app->get('/film/{film_id}', function ($request, $response, $args){
    $data['site_title'] = 'Detail Film :: Aplikasi Rental';
    $sql = 'select * from film where film_id = ?';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$args['film_id']]);
    $data['film'] = $stmt->fetch();
    return $this->tpl->render($response, 'film-detail.php', $data);
});

$film_select = [
    'rating' => ['G','PG','PG-13','R','NC-17'],
    'features' => ['Trailers','Commentaries','Deleted Scenes','Behind the Scenes']
];

function list_language($app){
    $sql = 'select * from language';
    $stmt = $app->pdo->query($sql);
    return $stmt->fetchAll();
}

$app->get('/add-film', function ($request, $response, $args){
    global $film_select;

    $data['site_title'] = 'Tambah Film :: Aplikasi Rental';
    $data['rating'] = $film_select['rating'];
    $data['features'] = $film_select['features'];
    $data['langs'] = list_language($this);
    return $this->tpl->render($response, 'film-form.php', $data);
});

$app->get('/edit-film/{film_id}', function ($request, $response, $args){
    global $film_select;

    $data['site_title'] = 'Edit Film :: Aplikasi Rental';
    $data['rating'] = $film_select['rating'];
    $data['features'] = $film_select['features'];
    $data['langs'] = list_language($this);

    $stmt = $this->pdo->prepare('select * from film where film_id = ?');
    $stmt->execute([$args['film_id']]);
    $data['film'] = $stmt->fetch();

    return $this->tpl->render($response, 'film-form.php', $data);
});

$app->get('/del-film/{film_id}', function ($request, $response, $args){
    $sql = 'delete from film where film_id = ?';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$args['film_id']]);

    return $response->withRedirect($request->getUri()->getBasePath().'/films');
});

$app->post('/add-film', function ($request, $response, $args){
    $post = $request->getParsedBody();
    $sql = 'insert into film 
                (title, description, release_year, language_id, rental_duration, 
                rental_rate, length, replacement_cost, rating, special_features)
            values (:title, :desc, :year, :lang, :duration, :rate, :length, :rep_cost, 
                :rating, :features)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam('title', $post['title']);
    $stmt->bindParam('desc', $post['desc']);
    $stmt->bindParam('year', $post['year']);
    $stmt->bindParam('lang', $post['lang']);
    $stmt->bindParam('duration', $post['duration']);
    $stmt->bindParam('rate', $post['rate']);
    $stmt->bindParam('length', $post['length']);
    $stmt->bindParam('rep_cost', $post['rep_cost']);
    $stmt->bindParam('rating', $post['rating']);
    $stmt->bindParam('features', $post['features']);
    $stmt->execute();
    return $response->withRedirect($request->getUri()->getBasePath().'/films');
});

$app->post('/edit-film/{film_id}', function ($request, $response, $args){
    $post = $request->getParsedBody();
    $sql = 'update film set 
                title = :title, description = :desc,
                release_year = :year, language_id = :lang,
                rental_duration = :duration, rental_rate = :rate,
                length = :length, replacement_cost = :rep_cost,
                rating = :rating, special_features = :features
            where film_id = :film_id';
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam('title', $post['title']);
    $stmt->bindParam('desc', $post['desc']);
    $stmt->bindParam('year', $post['year']);
    $stmt->bindParam('lang', $post['lang']);
    $stmt->bindParam('duration', $post['duration']);
    $stmt->bindParam('rate', $post['rate']);
    $stmt->bindParam('length', $post['length']);
    $stmt->bindParam('rep_cost', $post['rep_cost']);
    $stmt->bindParam('rating', $post['rating']);
    $stmt->bindParam('features', $post['features']);
    $stmt->bindParam('film_id', $args['film_id']);
    $stmt->execute();
    return $response->withRedirect($request->getUri()->getBasePath().'/films');

});