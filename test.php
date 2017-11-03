<?php
/**
 * Hilton Curl Test.
 */
require_once "config.php";
/* Parameters */
$parameters = array(
    "server" => $_SERVER['SERVER_ADDR'],
    "called" => time(),
    "use_proxy" => isset($_GET['use_proxy']),
    "url" => "https://secure3.hilton.com/en_US/hi/reservation/book.htm",
    "query_string" => "ctyhocn=BSBHITW&arrivalDay=16&arrivalMonth=03&arrivalYear=2018&departureDay=17&departureMonth=03&departureYear=2018&spec_plan=GHOTA&datesFlex=false&cid=OM,WW,HILTONLINK,EN,DirectLink&fromId=HILTONLINKDIRECT",
    "proxy_details" => $CONFIG['proxy_details'],
    "agent" => $_SERVER['HTTP_USER_AGENT']
);
/* Custom Agent */
if (isset($_GET['user_agent'])) {
    $parameters['agent'] = $_GET['user_agent'];
}

/* Curl Initialising */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $parameters['url']."?".$parameters['query_string']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, $parameters['agent']);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, "/tmp/tmpcookies");
curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
if ($parameters['use_proxy']) {
    curl_setopt($ch, CURLOPT_PROXY, $parameters['proxy_details']);
}
/* Execute */
$result = curl_exec($ch);
/* Information Block */
$info = curl_getinfo($ch);
curl_close($ch);

/* Output */
print "<XMP>";
print "Errors? : " . curl_errno($ch) . "\n";
print_r($parameters);
print_r($info);
print_r($result);
print "</XMP>";
