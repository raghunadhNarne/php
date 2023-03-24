<?php
    echo '<pre>';
    var_dump($var1);
    $var1;
    var_dump($var1);
    $var1 = "";
    var_dump($var1);
    $var1 = "a variable";
    var_dump($var1);
    $var1 = 7;
    var_dump($var1);
    unset($var1);
    var_dump($var1);

    //testing scope

    $var1 = 9; 
    function test()
    { 
        var_dump($var1); 
    } 
    test();


    $a = 1;
    $b = 2;
    function Sum()
    {
        global $a, $b;

        $b = $a + $b;
    } 
    Sum();
    echo "b:".$b. "<br>";


    $int = sqrt(121);
    var_dump($int);
    var_dump((int)$int);


    //variable variable
    $var2 = "var1";
    var_dump($$var2);
    var_dump($$var1);   //null



    $nameTypes = array("first", "last", "age");
    $name_first = "first";
    $name_last = "last";
    $name_age = 21;
    foreach($nameTypes as $type)
    print ${"name_$type"} . "\n";


    var_dump(0 == "0");
    var_dump(0 == false);
    var_dump(null == "");
    var_dump(null == array());
    var_dump(null);



    $a1 = array( "a" => 0, "b" => 1 );
    $a2 = array( "aa" => 00, "bb" => 11 );

    $together = array( $a1, $a2 );

    foreach( $together as $single ) {
        
        $single[ "c" ] = 3 ;

    }
    print_r( $together ); 
    print_r("hiiii........"."<br>");

    foreach( $together as $key => $value ) {

        $together[$key]["c"] = 3 ;

    }
    print_r( $together );




    $array = range('A', 'Z');
    print_r($array);
    $array2 = array_merge(array('All'), range('A', 'Z'));
    print_r($array2)
?>