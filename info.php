<?php

$url = 'https://www.klub-sousedu.cz/svj-thomasova-235/info';
$prefix = 'https://www.klub-sousedu.cz/svj-thomasova-235/';

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; info.php proxy)',
]);
$html = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

if ($html === false || $status >= 400) {
    http_response_code(502);
    echo 'Failed to load source page.' . ($error ? ' ' . htmlspecialchars($error) : '');
    exit;
}

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML('<?xml encoding="UTF-8">' . $html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$links = $xpath->query('//div[contains(concat(" ", normalize-space(@class), " "), " menu ")]//a[@href]');

foreach ($links as $link) {
    $href = $link->getAttribute('href');
    if (strpos($href, $prefix) === 0) {
        $link->setAttribute('href', str_replace("/info", "/info.php", str_replace("/dulezite-informace", "/dulezite-informace.html", str_replace($prefix, "https://svjthomasova235.cz/", $href))));
    }
}

header('Content-Type: text/html; charset=UTF-8');
echo $dom->saveHTML();
