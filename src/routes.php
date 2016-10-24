<?php
// Routes

$app->get('/[{category}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Fetch Quote
    // $db = $this->db;
    // $stmt = $db->query("SHOW TABLES");
    // $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $quoteClient = new \Quote();
    $quote = $quoteClient->fetchQuote($args['category']);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', array("quote" => $quote) );
});
