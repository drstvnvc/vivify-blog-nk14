<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_asdfas() {
        // priprema testa - priprema podataka za autentifikaciju, request body, sesiju itd...
        // izvršavanje funkcionalnosti koju testiramo i hvatanje rezultata
        $result = true;
        // tvrdnje da je rezultat onakav kakav očekujemo
        $this->assertTrue($result);
    }
}
