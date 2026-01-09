<?php
/*
|--------------------------------------------------------------------------
| OOP PRACTICE FILE – PROFESSIONAL CALCULATOR SYSTEM
|--------------------------------------------------------------------------
| This single file demonstrates:
| - Classes & Objects
| - Constructors
| - Access Modifiers
| - Inheritance
| - Abstraction
| - Interfaces
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| 1. INTERFACE
|--------------------------------------------------------------------------
| Interfaces define RULES.
| Any class that implements this interface MUST define these methods.
*/
interface CalculatorInterface
{
    public function add();
    public function subtract();
    public function multiply();
    public function divide();
}

/*
|--------------------------------------------------------------------------
| 2. ABSTRACT CLASS (PARTIAL IMPLEMENTATION)
|--------------------------------------------------------------------------
| Abstract classes can have:
| - Abstract methods (no body)
| - Concrete methods (with logic)
*/
abstract class BaseCalculator implements CalculatorInterface
{
    // Protected properties (accessible in child classes)
    protected $num1;
    protected $num2;

    /*
    |--------------------------------------------------------------------------
    | 3. CONSTRUCTOR
    |--------------------------------------------------------------------------
    | Automatically runs when object is created
    */
    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    // Concrete method (shared logic)
    protected function validateDivision()
    {
        if ($this->num2 == 0) {
            return false;
        }
        return true;
    }
}

/*
|--------------------------------------------------------------------------
| 4. CHILD CLASS (INHERITANCE)
|--------------------------------------------------------------------------
| This class:
| - Extends BaseCalculator
| - Implements required interface methods
*/
class Calculator extends BaseCalculator
{
    // Public method (accessible everywhere)
    public function add()
    {
        return $this->num1 + $this->num2;
    }

    public function subtract()
    {
        return $this->num1 - $this->num2;
    }

    public function multiply()
    {
        return $this->num1 * $this->num2;
    }

    public function divide()
    {
        if (!$this->validateDivision()) {
            return "Error: Division by zero is not allowed.";
        }

        return $this->num1 / $this->num2;
    }

    /*
    |--------------------------------------------------------------------------
    | 5. PRIVATE METHOD (DATA SECURITY)
    |--------------------------------------------------------------------------
    | Private methods are ONLY accessible inside this class
    */
    private function secretFormula()
    {
        return ($this->num1 * $this->num2) + 100;
    }

    // Public wrapper to access private logic safely
    public function getSecretResult()
    {
        return $this->secretFormula();
    }
}

/*
|--------------------------------------------------------------------------
| 6. OBJECT CREATION (REAL USAGE)
|--------------------------------------------------------------------------
| Class = Blueprint
| Object = Real instance
*/
$calculator = new Calculator(10, 5);

/*
|--------------------------------------------------------------------------
| 7. OUTPUT (TESTING ALL FEATURES)
|--------------------------------------------------------------------------
*/
echo "Addition: " . $calculator->add() . PHP_EOL;
echo "Subtraction: " . $calculator->subtract() . PHP_EOL;
echo "Multiplication: " . $calculator->multiply() . PHP_EOL;
echo "Division: " . $calculator->divide() . PHP_EOL;
echo "Secret Result: " . $calculator->getSecretResult() . PHP_EOL;

/*
|--------------------------------------------------------------------------
| END OF FILE
|--------------------------------------------------------------------------
*/