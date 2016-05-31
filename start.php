<?php
/**
 * Created by PhpStorm.
 * User: peterzen
 * Date: 5/29/16
 * Time: 8:25 PM
 */

// load faker
require_once 'vendor/fzaninotto/faker/src/autoload.php';

// suppress notices(they happen with faker magic functions)
error_reporting(E_ALL & ~E_NOTICE);

$faker = Faker\Factory::create();
$faker->seed(1234);

// Oracle Database configuration variables -- Edit these!
$odb_user = "oracle";
$odb_password = "oracle";
$odb_ip = "127.0.0.1";
$odb_port = "1521";
$odb_servicename = "orcl";

// establish database connection
$conn = oci_connect($odb_user, $odb_password, "//".$odb_ip.":".$odb_port."/".$odb_servicename);
if (!$conn) {
    $e = oci_error();
    echo trigger_error($e['message'], E_USER_ERROR);
}



// simple statement to test the connection, dont forget to insert some values manually so the select does not return an
// empty resultset
//$stid = oci_parse($conn, 'SELECT * FROM BARS');
//$r = oci_execute($stid);
//if (!$r) {
//    $e = oci_error($stid);
//    echo trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
//}
//
//while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
//    echo $row['ID'] . " : " . $row['NAME'] . "\n";
//}
//
//oci_free_statement($stid);



// seed bars table
//$stid = oci_parse($conn, 'INSERT INTO BARS (NAME, LOCATION, NUMBER_OF_PERSONEL, TYPE) VALUES(:pname, :ploc, :pnrop, :ptype)');
//for ($i = 1; $i <= 8; $i++) {
//    oci_bind_by_name($stid, ':pname', $name = 'Bar '.$i);
//    oci_bind_by_name($stid, ':ploc', $faker->city());
//    oci_bind_by_name($stid, ':pnrop', $faker->numberBetween(2, 9));
//    $types = ['LARGE', 'MEDIUM', 'SMALL'];
//    oci_bind_by_name($stid, ':ptype', $types[$faker->numberBetween(0, 2)]);
//
//    $r = oci_execute($stid);
//    if ($r) {
//        print "One row inserted\n";
//    } else {
//        echo "Row failed\n";
//    }
//}
//oci_free_statement($stid);



// seed students table !! typo in address column... twice..
// (NAME, ADRESS, BSN, ADRESS_PARENTS, BANKACCOUNT, SEX) VALUES (:pname, :paddr, :pbsn, :paddrp, :pbankacc, :pgender)
//$stid = oci_parse($conn, 'INSERT INTO STUDENTS (NAME, ADRESS, BSN, ADRESS_PARENTS, BANKACCOUNT, SEX) VALUES (:pname, :paddr, :pbsn, :paddrp, :pbankacc, :pgender)');
//for ($i = 1; $i <= 40; $i++) {
//    $a = $faker->name;
//    oci_bind_by_name($stid, ':pname', $a);
//    $b = $faker->unique()->address;
//    oci_bind_by_name($stid, ':paddr', $b);
//    $c = $faker->unique()->numberBetween(100000000, 999999999);
//    oci_bind_by_name($stid, ':pbsn', $c);
//    $d = $faker->unique()->address;
//    oci_bind_by_name($stid, ':paddrp', $d);
//    $e = $faker->iban('NL');
//    oci_bind_by_name($stid, ':pbankacc', $e);
//    $f = $faker->randomElement(['F', 'M', 'U']);
//    oci_bind_by_name($stid, ':pgender', $f);
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed events table
//$stid = oci_parse($conn, 'INSERT INTO EVENTS (NAME, BEGINDATETIME, ENDDATETIME, TYPE, EXPECTED_NUMBER_OF_VISITORS) VALUES (:pname, TO_DATE(:pstartdate, \'yyyy/mm/dd hh24:mi:ss\'), TO_DATE(:penddate, \'yyyy/mm/dd hh24:mi:ss\'), :ptype, :pexpectnrofvis)');
//for ($i = 0; $i <= 10; $i++) {
//    $a = $faker->name;
//    oci_bind_by_name($stid, ':pname', $a);
//
//    $dateFormat = "Y-m-d H:i:s";
//
//    $randomDate = $faker->unique()->dateTimeThisMonth;
//    $b = date($dateFormat, $randomDate->getTimestamp());
//    oci_bind_by_name($stid, ':pstartdate', $b);
//
//    $startDate = $randomDate;
//    $endDate = $startDate->modify('+'.$faker->numberBetween(2, 6).' hours');
//    $c = date($dateFormat, $endDate->getTimestamp());
//    oci_bind_by_name($stid, ':penddate', $c);
//
//    var_dump($b); var_dump($c);
//
//    $types = ['NORMAL', 'QUIET', 'ROUGH'];
//    oci_bind_by_name($stid, ':ptype', $types[$faker->numberBetween(0, 2)]);
//
//    $e = $faker->numberBetween(100, 2000);
//    oci_bind_by_name($stid, ':pexpectnrofvis', $e);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed coupon sales points table
//$stid = oci_parse($conn, 'INSERT INTO COUPON_SLS_POINTS (LOCATION) VALUES  (:ploc)');
//for ($i = 0; $i <= 3; $i++) {
//    $a = $faker->streetAddress;
//    oci_bind_by_name($stid, ':ploc', $a);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed proprietors table
//$stid = oci_parse($conn, 'INSERT INTO PROPRIETORS (NAME) VALUES (:pname)');
//for ($i = 0; $i <= 3; $i++) {
//    $a = $faker->company;
//    oci_bind_by_name($stid, ':pname', $a);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed proprietor_bars table
//$stid = oci_parse($conn, 'INSERT INTO PROPRIETOR_BARS (BEGINDATE, ENDDATE, PROPRIETORS_ID, BARS_ID) VALUES (TO_DATE(:pstartdate, \'yyyy / mm / dd hh24:mi:ss\'), TO_DATE(:penddate, \'yyyy / mm / dd hh24:mi:ss\'), :ppropid, :pbarid)');
//
//// get proprietors and bars so we can use their ids later
//$propIds = get_table_ids('PROPRIETORS', $conn);
//$barIds = get_table_ids('BARS', $conn);
//
//for ($i = 1 ; $i <= 8 ; $i++) {
//    $dateFormat = "Y-m-d H:i:s";
//
//    $startDate = $faker->dateTimeThisYear;
//    $a = date($dateFormat, $startDate->getTimestamp());
//    oci_bind_by_name($stid, ':pstartdate', $a);
//
//    $endDate = $faker->dateTimeBetween('2017', '+3 years');
//    $b = date($dateFormat, $endDate->getTimestamp());
//    oci_bind_by_name($stid, ':penddate', $b);
//
//    $c = $propIds[$faker->numberBetween(0, sizeof($propIds)-1)];
//    oci_bind_by_name($stid, ':ppropid', $c);
//
//    $d = $barIds[$i];
//    oci_bind_by_name($stid, ':pbarid', $d);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed schedules table
//$stid = oci_parse($conn, 'INSERT INTO SCHEDULES ( BEGINDATETIME, ENDDATETIME, EVENTS_ID, PROPRIETOR_BARS_ID, NUMBER_OF_WAITERS, NUMBER_OF_TAPSTER, NUMBER_OF_COUPONSELLERS, NUMBER_OF_DISTRIBUTORS, COUPON_SELL_POINTS_ID) VALUES (TO_DATE(:pstartdate, \'yyyy / mm / dd hh24:mi:ss\'), TO_DATE(:penddate, \'yyyy / mm / dd hh24:mi:ss\'), :peventid, :ppropbarid, :pnrofwaiters, :pnroftap, :pnrofcoupon, :pnrofdist, :pcouponid)');
//// get ids for events, proprietor_bars and coupon sales points
//$eventIds = get_table_ids('EVENTS', $conn);
//$propBarIds = get_table_ids('PROPRIETOR_BARS', $conn);
//$couponIds = get_table_ids('COUPON_SLS_POINTS', $conn);
//
//// add schedule rows for bars
//for ($i = 1; $i <= 8; $i++) {
//    // set coupon columns null
//    $g = null; $dontusei = null;
//
//    $dateFormat = "Y-m-d H:i:s";
//
//    // why not just use the event start and end date?
//    // anyway for now i am just going to insert some irrelevant mock data
//    $startDate = $faker->dateTimeThisMonth;
//    $a = date($dateFormat, $startDate->getTimestamp());
//    oci_bind_by_name($stid, ':pstartdate', $a);
//
//    $endDate = $startDate->modify('+'.$faker->numberBetween(2, 6).' hours');
//    $b = date($dateFormat, $endDate->getTimestamp());
//    oci_bind_by_name($stid, ':penddate', $b);
//
//    $c = $eventIds[sizeof($eventIds)-1]; // do all schedule rows relate to the same event? Just use the last event(manually added: Ajax - Twente)
//    oci_bind_by_name($stid, ':peventid', $c);
//
//    $d = $propBarIds[$i-1];
//    oci_bind_by_name($stid, ':ppropbarid', $d);
//
//    $e = $faker->numberBetween(2, 10);
//    oci_bind_by_name($stid, ':pnrofwaiters', $e);
//
//    $f = $faker->numberBetween(2, 10);
//    oci_bind_by_name($stid, ':pnroftap', $f);
//    oci_bind_by_name($stid, ':pnrofcoupon', $g);
//
//    $h = $faker->numberBetween(2, 10);
//    oci_bind_by_name($stid, ':pnrofdist', $h);
//    oci_bind_by_name($stid, ':pcouponid', $dontusei);
//
//    oci_execute($stid);
//}
//for ($i = 1; $i <= 2; $i++) {
//    // set bar columns null
//    $d = null; $e = null; $f = null; $h = null;
//
//    $dateFormat = "Y-m-d H:i:s";
//
//    // why not just use the event start and end date?
//    // anyway for now i am just going to insert some irrelevant mock data
//    $startDate = $faker->dateTimeThisMonth;
//    $a = date($dateFormat, $startDate->getTimestamp());
//    oci_bind_by_name($stid, ':pstartdate', $a);
//
//    $endDate = $startDate->modify('+'.$faker->numberBetween(2, 6).' hours');
//    $b = date($dateFormat, $endDate->getTimestamp());
//    oci_bind_by_name($stid, ':penddate', $b);
//
//    $c = $eventIds[sizeof($eventIds)-1]; // do all schedule rows relate to the same event? Just use the last event(manually added: Ajax - Twente)
//    oci_bind_by_name($stid, ':peventid', $c);
//
//    oci_bind_by_name($stid, ':ppropbarid', $d);
//    oci_bind_by_name($stid, ':pnrofwaiters', $e);
//    oci_bind_by_name($stid, ':pnroftap', $f);
//
//    $g = $faker->numberBetween(1, 3);
//    oci_bind_by_name($stid, ':pnrofcoupon', $g);
//    oci_bind_by_name($stid, ':pnrofdist', $h);
//
//    $dontusei = $couponIds[$i];
//    oci_bind_by_name($stid, ':pcouponid', $dontusei);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed applies table
//$stid = oci_parse($conn, 'INSERT INTO APPLIES (CAPACITY, STATUS, SCHEDULES_ID, STUDENTS_ID) VALUES(:pcap, :pstat, :pschedid, :pstudid)');
//
//// retrieve ids for students and schedules
//$studIds = get_table_ids('STUDENTS', $conn);
//$schedIds = get_table_ids('SCHEDULES', $conn);
//
//for ($i = 1; $i <= 40; $i++) {
//    $capacities = ['COUPON_SELLER','DISTRIBUTOR','TAPSTER','WAITER'];
//    oci_bind_by_name($stid, ':pcap', $capacities[$faker->numberBetween(0, sizeof($capacities)-1)]);
//    $statuses = ['APPLY', 'PLANNED'];
//    oci_bind_by_name($stid, ':pstat', $statuses[$faker->numberBetween(0, sizeof($statuses)-1)]);
//    $c = $schedIds[$faker->numberBetween(0, sizeof($schedIds)-1)];
//    oci_bind_by_name($stid, ':pschedid', $c);
//    $d = $studIds[$faker->numberBetween(0, sizeof($studIds)-1)];
//    oci_bind_by_name($stid, ':pstudid', $d);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed orders
//$stid = oci_parse($conn, 'INSERT INTO ORDERS (DATEORDER, BARS_ID, STUDENTS_ID) VALUES(TO_DATE(:pdate, \'yyyy / mm / dd hh24:mi:ss\'), :pbarid, :pstudid)');
//
//// retrieve student and bar ids
//$studIds = get_table_ids('STUDENTS', $conn);
//$barIds = get_table_ids('BARS', $conn);
//
//for ($i = 1; $i <= 10000; $i++) {
//    $dateFormat = "Y-m-d H:i:s";
//    $date = $faker->dateTimeBetween('2016-05-01 20:00:00', '2016-05-02 2:00:00');
//    $a = date($dateFormat, $date->getTimestamp());
//    oci_bind_by_name($stid, ':pdate', $a);
//    $b = $barIds[$faker->numberBetween(0, sizeof($barIds)-1)];
//    oci_bind_by_name($stid, ':pbarid', $b);
//    $c = $studIds[$faker->numberBetween(0, sizeof($studIds)-1)];
//    oci_bind_by_name($stid, ':pstudid', $c);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



// seed items
//$stid = oci_parse($conn, 'INSERT INTO ITEMS (NAME, TYPE, NUMBER_OF_COUPONS) VALUES (:pname, :ptype, :pcouponcount)');
//
//for ($i = 0; $i <= 12; $i++) {
//    $a = $faker->colorName;
//    oci_bind_by_name($stid, ':pname', $a);
//    $types = ['BEER', 'FOOD', 'SOFTDRINK', 'WINE'];
//    $b = $types[$faker->numberBetween(0, sizeof($types)-1)];
//    oci_bind_by_name($stid, ':ptype', $b);
//    $c = $faker->numberBetween(1, 19);
//    oci_bind_by_name($stid, ':pcouponcount', $c);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);



//$stid = oci_parse($conn, 'INSERT INTO ORDERITEMS ("NUMBER", ORDERS_ID, ITEMS_ID) VALUES (:pcount, :porderid, :pitemid)');
//
//// retrieve order and item ids
//$orderIds = get_table_ids('ORDERS', $conn);
//$itemIds = get_table_ids('ITEMS', $conn);
//
//// first 10k so we can match all orders to at least 1 item(using faker->unique mod)
//// secondly add 15k and remove the unique, but lower the item count
//for ($i = 1; $i <= 15000; $i++) {
//    $a = $faker->numberBetween(1, 4);
//    oci_bind_by_name($stid, ':pcount', $a);
//    $b = $orderIds[$faker->numberBetween(0, sizeof($orderIds)-1)];
//    oci_bind_by_name($stid, ':porderid', $b);
//    $c = $itemIds[$faker->numberBetween(0, sizeof($itemIds)-1)];
//    oci_bind_by_name($stid, ':pitemid', $c);
//
//    oci_execute($stid);
//}
//oci_free_statement($stid);


// close our connection
oci_close($conn);

// helper function
function get_table_ids($table, $conn)
{
    $stid = oci_parse($conn, 'SELECT ID FROM ' . strtoupper($table));
    oci_execute($stid);
    $ids = [];
    while ($row = oci_fetch_array($stid)) {
        $ids[] = $row['ID'];
    }
    oci_free_statement($stid);
    return $ids;
}