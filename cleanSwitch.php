<?php 

abstract class Employee
{
    abstract public function calculatePay(): Money;
    
    abstract public function deliverPay(Money $money): void;
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

class CommissionedEmployee extends Employee
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

    /**
     * [deliverPay description]
     *
     * @param   Money  $money  [$money description]
     *
     * @return  void           [return description]
     */
    public function deliverPay(Money $money): void
    {
        $this->calculatePay($money);
        // $pay->mail = 1;
        // send payment
    }
}


class Money
{

}

class EmployeeRecord
{

}