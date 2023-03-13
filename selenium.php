<?php
require_once "phpwebdriver/WebDriver.php";

$webdriver = new WebDriver("localhost", "5000");
$webdriver->connect("google chrome");                            
$webdriver->get("http://google.com");
$element = $webdriver->findElementBy(LocatorStrategy::name, "q");
if ($element) {
    $element->sendKeys(array("php webdriver" ) );
    $element->submit();
}

?>