<?php

interface Employee
{
    public function calculatePay();
    
    public function isPayday();
    
    public function deliverPay();
}

class Commissioned implements Employee
{
    public function calculatePay()
    {
        return 1;
    }
    
    public function isPayday()
    {
        return 1;
    }
    
    public function deliverPay()
    {
        return 1;
    }

}


class InvalidEmployeeType extends Exception
{
}

class Payment 
{
    public function calculatePay(Employee $employee)
    {
        switch ($employee->type) {
            case Employee::COMMISSIONED:
                return $this->calculateComissionedPay($employee);
                break;
            case Employee::HOURLY:
                return $this->calculateHourlyPay($employee);
                break;
            case Employee::SALARIED:
                return $this->calculateSalariedPay($employee);
                break;
            default:
                throw new InvalidEmployeeType('Error Processing Request', 1);
                break;
        }
    }
   
    public function calculateHourlyPay($employee)
    {
        // code...
    }
    
    public function calculateSalariedPay($employee)
    {
        // code...
    }
}
