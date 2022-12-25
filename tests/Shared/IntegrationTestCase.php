<?php

namespace App\Tests\Shared;
use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class IntegrationTestCase extends KernelTestCase
{
    /** @var EntityManager $em */
    protected $em;
    public function setUp():void
    {
        parent::setUp();
        self::bootKernel();
        $this->em =static::getContainer()->get('doctrine.orm.entity_manager');
        $this->em->beginTransaction();
    }

    public function tearDown():void
    {
        $this->em->rollback();
        parent::tearDown();

    }

    protected function faker(): Generator
    {
        return Factory::create();
    }
}