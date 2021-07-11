<?php

namespace Tests\Unit\Repositories;

use App\Repositories\DepartmentsRepository;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use Tests\TestCase;

class DepartmentsRepositoryTest extends TestCase
{
    public DepartmentsRepositoryInterface $departmentsRepository;

    protected function setUp(): void
    {
        $this->departmentsRepository = new DepartmentsRepository();
        parent::setUp();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAllDepartments()
    {
        $this->assertCount(2, $this->departmentsRepository->all());
    }

    public function testFindNumberOfEmployeesDepartments()
    {
        $this->assertEquals(2, $this->departmentsRepository->findNumberOfEmployeesDepartments(2));
    }

    public function testRemainingDepartments()
    {
        $this->assertCount(1, $this->departmentsRepository->remainingDepartments([1]));
    }

    public function testMaxWageStaff()
    {
        $this->assertEquals(1233, $this->departmentsRepository->maxWageStaff(2));
    }
}
