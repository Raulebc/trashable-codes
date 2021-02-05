<?php 

abstract class Employee
{
    abstract public function isPayDay(): bool;

    abstract public function calculatePay(): Money;
    
    abstract public function deliverPay(Money $pay): void;
}

interface EmployeeFactory
{
    public function makeEmployee(EmployeeRecord $r): Employee;
}

class EmployeeFactoryImpl
{
    public function makeEmployee(EmployeeRecord $r)
    {
        switch ($r->type) {
            case 'COMMISSIONED':
                return new CommissionedEmployee($r);
                break;
            
            default:
                # code...
                break;
        }
    }
}

class CommissionedEmployee implements Employee
{
    public function isPayDay(): bool
    {
        return true;
    }

    public function calculatePay(): Money
    {
        $money = new Money;

        return $money;
    }

    public function deliverPay(Money $pay): void
    {
        // $pay->mail = 1;
        // send payment
        return;
    }
}


class Money
{

}

class EmployeeRecord
{

}