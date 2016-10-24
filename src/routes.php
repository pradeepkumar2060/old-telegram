<?php
// Routes

$app->get('/[{category}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Fetch Quote
    $quoteClient = new \Quote();
    $quote = $quoteClient->fetchQuote($args['category']);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', array("quote" => $quote) );
});
