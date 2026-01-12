<?php
/*
|--------------------------------------------------------------------------
| ADVANCED PHP OOP PRACTICE (STEP 6 – STEP 10)
|--------------------------------------------------------------------------
| Covered Concepts:
| 6. Static Methods & Properties
| 7. Traits
| 8. Constants
| 9. Magic Methods
| 10. Namespaces
| Final Mini-System Challenge
|--------------------------------------------------------------------------
*/

namespace App\Core;

/*
|--------------------------------------------------------------------------
| STEP 6: STATIC METHODS & PROPERTIES
|--------------------------------------------------------------------------
*/
class MathHelper
{
    public static $pi = 3.14;

    public static function square($number)
    {
        return $number * $number;
    }
}

/*
|--------------------------------------------------------------------------
| STEP 7: TRAITS (SHARED FEATURES)
|--------------------------------------------------------------------------
*/
trait Logger
{
    public function log($message)
    {
        echo "Log: $message" . PHP_EOL;
    }
}

trait Uploader
{
    public function upload()
    {
        echo "File Uploaded Successfully." . PHP_EOL;
    }
}

/*
|--------------------------------------------------------------------------
| STEP 8: CONSTANTS
|--------------------------------------------------------------------------
*/
class Config
{
    const APP_NAME = "OOP Mini System";

    public function showAppName()
    {
        echo self::APP_NAME . PHP_EOL;
    }
}

/*
|--------------------------------------------------------------------------
| STEP 9: MAGIC METHODS
|--------------------------------------------------------------------------
*/
class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "User Object: {$this->name}";
    }

    public function __destruct()
    {
        // Cleanup logic if needed
        // echo "User object destroyed" . PHP_EOL;
    }
}

/*
|--------------------------------------------------------------------------
| FINAL CHALLENGE: MINI SYSTEM
|--------------------------------------------------------------------------
*/

/*
| Abstract Class
*/
abstract class Account
{
    protected $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    abstract public function getBalance();

    // Static Method (Currency Exchange)
    public static function dollarToPKR()
    {
        return 280; // Example exchange rate
    }
}

/*
| Child Class using Trait + Inheritance
*/
class SavingsAccount extends Account
{
    use Logger, Uploader;

    public function getBalance()
    {
        return $this->balance;
    }
}

/*
|--------------------------------------------------------------------------
| OBJECT CREATION & TESTING
|--------------------------------------------------------------------------
*/

// Static Access (No Object)
echo "PI Value: " . MathHelper::$pi . PHP_EOL;
echo "Square of 5: " . MathHelper::square(5) . PHP_EOL;

// Constant Access
echo Config::APP_NAME . PHP_EOL;

// Magic Method
$user = new User("Mudasir");
echo $user . PHP_EOL;

// Mini System
$account = new SavingsAccount(50000);
echo "Account Balance: " . $account->getBalance() . PHP_EOL;
$account->log("Savings account created");
$account->upload();

// Static Method from Abstract Class
echo "1 Dollar = " . Account::dollarToPKR() . " PKR" . PHP_EOL;

/*
|--------------------------------------------------------------------------
| END OF FILE
|--------------------------------------------------------------------------
*/
