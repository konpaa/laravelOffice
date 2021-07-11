<?php

namespace Tests\Unit\Repositories;

use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\StaffRepository;
use Tests\TestCase;

class StaffRepositoryTest extends TestCase
{
    private StaffRepositoryInterface $staffRepository;

    protected function setUp(): void
    {
        $this->staffRepository = new StaffRepository();
        parent::setUp();
    }

    public function testAll()
    {
        $this->assertCount(3, $this->staffRepository->all());
    }

    public function testGetIdDepartmentsInWhichHeWorks()
    {
        $this->assertCount(2, $this->staffRepository->getIdDepartmentsInWhichHeWorks(3));
    }
}
