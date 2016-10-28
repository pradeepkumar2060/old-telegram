<?php
// Routes

$app->get('/dumpConfig', function ($request, $response, $args) {
    phpinfo();
    return;
});

$app->get('/[{category}]', function ($request, $response, $args) {
    // Fetch Quote
    // $db = $this->db;
    // $stmt = $db->query("SHOW TABLES");
    // $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $quoteClient = new \Quote();
    $quote = $quoteClient->fetchQuote($args['category']);

    if (session_status() !== PHP_SESSION_NONE) {
        $messages = $this->flash->getMessages();
    }

    // Render index view
    return $this->renderer->render($response, 'index.phtml', array("quote" => $quote, "messages"=>$messages) );
})->setName('welcome');

$app->post('/like/{id}', function ($request, $response, $args) {
    $this->flash->addMessage('liked', true);
    return $response->withRedirect($this->router->pathFor('welcome'));
});