<?php 

declare(strict_types=1);
 
namespace JustSteveKing\DataObjects\Tests;
 
use JustSteveKing\DataObjects\Providers\PackageServiceProvider;
use Orchestra\Testbench\TestCase;
 
class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}