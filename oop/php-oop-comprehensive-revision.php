<?php
/*
|--------------------------------------------------------------------------
| PHP OOP – COMPREHENSIVE REVISION PRACTICE
|--------------------------------------------------------------------------
| Author: Mudasir Razvi
| Purpose:
| - Strengthen OOP foundations
| - Re-analyze architecture-level concepts
| - Prepare for scalable engineering (beyond WordPress)
|--------------------------------------------------------------------------
| Concepts Covered:
| ✔ Classes & Objects
| ✔ Access Modifiers
| ✔ Inheritance
| ✔ Traits
| ✔ Static Methods
| ✔ Namespaces
|--------------------------------------------------------------------------
*/

namespace App\Core;

/*
|--------------------------------------------------------------------------
| 1. BLUEPRINT LOGIC – CLASS & OBJECT
|--------------------------------------------------------------------------
*/
class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function introduce()
    {
        echo "My name is {$this->name}" . PHP_EOL;
    }
}

$person = new Person("Mudasir");
$person->introduce();

/*
|--------------------------------------------------------------------------
| 2. SECURITY LAYERS – ACCESS MODIFIERS
|--------------------------------------------------------------------------
*/
class BankAccount
{
    public $accountHolder;
    protected $balance;
    private $pin;

    public function __construct($name, $balance, $pin)
    {
        $this->accountHolder = $name;
        $this->balance = $balance;
        $this->pin = $pin;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    private function verifyPin($pin)
    {
        return $this->pin === $pin;
    }

    public function withdraw($amount, $pin)
    {
        if ($this->verifyPin($pin) && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawal successful." . PHP_EOL;
        } else {
            echo "Access denied." . PHP_EOL;
        }
    }
}

$account = new BankAccount("Mudasir", 50000, 1234);
echo "Balance: " . $account->getBalance() . PHP_EOL;
$account->withdraw(5000, 1234);

/*
|--------------------------------------------------------------------------
| 3. POWER OF INHERITANCE
|--------------------------------------------------------------------------
*/
class Employee extends Person
{
    protected $role;

    public function __construct($name, $role)
    {
        parent::__construct($name);
        $this->role = $role;
    }

    public function getRole()
    {
        echo "{$this->name} works as {$this->role}" . PHP_EOL;
    }
}

$employee = new Employee("Mudasir", "Software Engineer");
$employee->getRole();

/*
|--------------------------------------------------------------------------
| 4. ADVANCED REUSABILITY – TRAITS & STATIC METHODS
|--------------------------------------------------------------------------
*/
trait Logger
{
    public function log($message)
    {
        echo "Log: $message" . PHP_EOL;
    }
}

class Utility
{
    public static function formatCurrency($amount)
    {
        return "PKR " . number_format($amount);
    }
}

class Order
{
    use Logger;

    private $total;

    public function __construct($amount)
    {
        $this->total = $amount;
        $this->log("Order created");
    }

    public function showTotal()
    {
        echo Utility::formatCurrency($this->total) . PHP_EOL;
    }
}

$order = new Order(150000);
$order->showTotal();

/*
|--------------------------------------------------------------------------
| 5. ORGANIZATION STANDARD – NAMESPACES
|--------------------------------------------------------------------------
*/
namespace App\Services;

class Notification
{
    public function send()
    {
        echo "Notification sent successfully." . PHP_EOL;
    }
}

// Using fully qualified namespace
$notification = new \App\Services\Notification();
$notification->send();

