<?php


class PagesTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')->assertResponseOk();
    }
}