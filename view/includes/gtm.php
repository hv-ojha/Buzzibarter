<?php
// Load the web test framework class.
require_once("Services_WTF_Test.php");
class gtmetrix
{
	function test($url_to_test)
	{
	ini_set('max_execution_time', 300);
// Sample code to test a site via GTmetrix using the Web Testing
// Framework (WTF) API.

// Create your web test object. You pass in your username and password. For
// GTmetrix, your username is your email, and your password is your API key. You
// can get an API key at http://gtmetrix.com/api/
$test = new Services_WTF_Test("ojhaharsh7@gmail.com", "1420a6f065248c8086d025974578eda0");

// To test a site, run the test() method, and pass in at minimum a url to test. Returns
// the testid on success, or false and error messsage in $test->error if failure.
//$url_to_test = "http://google.com/";
// echo "Testing"."<br>". "$url_to_test\n";
$testid = $test->test(array(
    'url' => $url_to_test
));
if ($testid) {
  //  echo "Test started with "."<br>". "$testid\n";
}
else {
    die("Test failed: "."<br>". $test->error() . "\n");
}

// Other options include:
//
//      location => 4  - test from the Dallas test region (see locations below)
//      login-user => 'foo',
//      login-pass => 'bar',  - the test requires http authentication
//      x-metrix-adblock => 1 - use the adblock plugin during this test
//
// For more information on options, see http://gtmetrix.com/api/

// After calling the test method, your URL will begin testing. You can call:
//echo "Waiting for test to finish\n";
$test->get_results();

// which will block and return once your test finishes. Alternatively, can call:
//     $state = $test->state() 
// which will return the current state. Please don't check more than once per second.

// Once your test is finished, chech that it completed ok, otherwise get the results.
// Note: you must check twice. The first ->test() method can fail if url is malformed, or
// other immediate error. However, if you get a job id, the test itself may fail if the url
// can not be reached, or some pagespeed error.
if ($test->error()) {
    die($test->error());
}
$testid = $test->get_test_id();
//echo "Test completed succesfully with ID"."<br>". "$testid\n";
$results = $test->results();
return $results;
/*
foreach ($results as $result => $data) {
    echo "  $result => $data<br>";
}

echo "\nResources<br><br>";
$resources = $test->resources();
foreach ($resources as $resource => $url) {
    echo "  Resource:"."<br>". " $resource "."<br>". "$url\n";
}

// Each test has a unique test id. You can load an existing / old test result using:
echo "Loading test id"."<br>". " $testid\n";
$test->load($testid);

// If you no longer need a test, you can delete it:
echo "Deleting test id"."<br>". " $testid\n";
$result = $test->delete();
if (! $result) { die("error deleting test: " . $test->error()); }

// To list possible testing locations, use locations() method:
echo "\nLocations GTmetrix can test from:<br><br>";
$locations = $test->locations();
// Returns an array of associative arrays:
foreach ($locations as $location) {
    echo "GTmetrix can run tests from: "."<br>" . $location["name"] . "<br>"." using id: " . $location["id"] ."<br>". " default (" . $location["default"] . ")\n";
}

 Sample output:

Testing http://gtmetrix.com/
Test started with PnV4kAr2
Waiting for test to finish
Test completed succesfully with ID PnV4kAr2
  page_load_time => 480
  html_bytes => 3346
  page_elements => 16
  report_url => http://gtmetrix.com/reports/gtmetrix.com/1r5AHf9E
  html_load_time => 28
  page_bytes => 90094
  pagespeed_score => 95
  yslow_score => 98

	Resources
	Resource: report_pdf https://gtmetrix.com/api/0.1/test/PnV4kAr2/report-pdf
	Resource: pagespeed https://gtmetrix.com/api/0.1/test/PnV4kAr2/pagespeed
	Resource: har https://gtmetrix.com/api/0.1/test/PnV4kAr2/har
	Resource: pagespeed_files https://gtmetrix.com/api/0.1/test/PnV4kAr2/pagespeed-files
	Resource: yslow https://gtmetrix.com/api/0.1/test/PnV4kAr2/yslow
	Resource: screenshot https://gtmetrix.com/api/0.1/test/PnV4kAr2/screenshot
	Loading test id PnV4kAr2
	Deleting test id PnV4kAr2

	Locations GTmetrix can test from:
	GTmetrix can run tests from: Vancouver, Canada using id: 1 default (1)
	GTmetrix can run tests from: London, UK using id: 2 default ()
	GTmetrix can run tests from: Sydney, Australia using id: 3 default ()
	GTmetrix can run tests from: Dallas, USA using id: 4 default ()
	GTmetrix can run tests from: Mumbai, India using id: 5 default ()

	*/
	}
	function resources($url_to_test)
	{
		ini_set('max_execution_time', 300);
// Sample code to test a site via GTmetrix using the Web Testing
// Framework (WTF) API.

// Create your web test object. You pass in your username and password. For
// GTmetrix, your username is your email, and your password is your API key. You
// can get an API key at http://gtmetrix.com/api/
		$test = new Services_WTF_Test("ojhaharsh7@gmail.com", "1420a6f065248c8086d025974578eda0");

// To test a site, run the test() method, and pass in at minimum a url to test. Returns
// the testid on success, or false and error messsage in $test->error if failure.
// To test a site, run the test() method, and pass in at minimum a url to test. Returns
// the testid on success, or false and error messsage in $test->error if failure.
//$url_to_test = "http://google.com/";
// echo "Testing"."<br>". "$url_to_test\n";
$testid = $test->test(array(
    'url' => $url_to_test
));
if ($testid) {
//    echo "Test started with "."<br>". "$testid\n";
}
else {
    die("Test failed: "."<br>". $test->error() . "\n");
}

// Other options include:
//
//      location => 4  - test from the Dallas test region (see locations below)
//      login-user => 'foo',
//      login-pass => 'bar',  - the test requires http authentication
//      x-metrix-adblock => 1 - use the adblock plugin during this test
//
// For more information on options, see http://gtmetrix.com/api/

// After calling the test method, your URL will begin testing. You can call:
//echo "Waiting for test to finish\n";
$test->get_results();

// which will block and return once your test finishes. Alternatively, can call:
//     $state = $test->state() 
// which will return the current state. Please don't check more than once per second.

// Once your test is finished, chech that it completed ok, otherwise get the results.
// Note: you must check twice. The first ->test() method can fail if url is malformed, or
// other immediate error. However, if you get a job id, the test itself may fail if the url
// can not be reached, or some pagespeed error.
if ($test->error()) {
    die($test->error());
}
$testid = $test->get_test_id();
// echo "Test completed succesfully with ID"."<br>". "$testid\n";
		$res=$test->resources();
		return $res;
	}
}
?>
