<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config Manager</title>
</head>
<body>
    <?php
    
    //Define system config constants
    define("HOST", "localhost");
    define("USER", "root");
    define("DATABASE", "myapp_db");
    define("PASSWORD","secure_code");
    
    
    //Define application information
    define("NAME", "Config_App");
    define("VERSION", "1.0");
    define("DEBUG_MODE", "disabled");

    //Define supported languages 
    define("LANGUAGES", ["English","Welsh","French","Spanish", "Portuguese"]);

    //display functions 

    // note that in modern PHP versions you cannot create case insensitive constants

    // as constants are global by default they can be accessed inside of a function

    //display constants to the user
    function system_info(){
        echo "Host: " . HOST . "<br>";
        echo "User: " . USER . "<br>";
        echo "Database: " . DATABASE . "<br>";
        echo "Password: " . PASSWORD . "<br>";
    }

    function app_info(){
        echo "Name: " . NAME . "<br>";
        echo "Version: " . VERSION . "<br>";
        echo "Debug Mode: " . DEBUG_MODE . "<br>";
    }
    //display a constant array to the user
    function language_details(){
        foreach (LANGUAGES as $language) {
            echo " - " . $language . "<br>";
        }
    }
    ?>

    <h2>Config Details</h2>
    <?php
    echo "<h1>User information: </h1>";
    system_info();
    echo "<h2>App information: </h2>";
    app_info();
    echo "<h3>Available Languages: </h3>";
    language_details();



    // demonstrating case sensitivity for constants greater than version 8.0
    echo "<br>Case insensitivity demonstration: <br>";
    echo "NAME: " . NAME . "<br>";
    echo "name: " . (defined("app_name") ? app_name : "Not accessible") . "<br>";
    
    
    // demonstrating that constants can be called from within a function due to their gloabl scope 
    function test_scope(){
        echo "<br>Testing if a constant can be called from within a function in which it has not been defined: <br>";
        echo "NAME inside function: " . NAME . "<br>";
    }

    test_scope();

    //error handling for constant reassignement 
    echo "<br>Error handling demonstration:<br>";
    try{
        //try to redefine a constant (this will fail)
        define("NAME", "NewName");
    } catch (Error $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
    ?>
    
</body>
</html>