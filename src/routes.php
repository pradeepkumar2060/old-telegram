<?php
// Routes

$app->get('/[{category}]', function ($request, $response, $args) {
    // Fetch Quote
    // $db = $this->db;
    // $stmt = $db->query("SHOW TABLES");
    // $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $category = $args!=null && isset($args['category']) ? $args['category'] : null;
    $quoteClient = new \Quote();
    $quote = $quoteClient->fetchQuote($category);

    if (session_status() !== PHP_SESSION_NONE) {
        $mesages = $this->flash->getMessages();
    }

    // Render index view
    return $this->renderer->render($response, 'index.phtml', array("quote" => $quote, "messages"=>$messages) );
})->setName('welcome');

$app->post('/like/{id}', function ($request, $response, $args) {
    $this->flash->addMessage('liked', true);
    $router = $this->router;
    return $response->withRedirect($router->pathFor('welcome'));
});