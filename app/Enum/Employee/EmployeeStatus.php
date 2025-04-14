<?php

namespace App\Enum\Employee;

enum EmployeeStatus: string
{
    case EMPLOYED = 'employed';
    case LEAVE = 'leave';
    case RESIGNED = 'resigned';
    case INTERN = 'intern';
}
