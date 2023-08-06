<?php 

declare(strict_types=1);
 
namespace Osen\Subscriptions\Console\Commands;
 
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
 
final class SubscriptionMakeCommand extends GeneratorCommand
{
    protected $signature = "make:dto {name : The DTO Name}";
 
    protected $description = "Create a new DTO";
 
    protected $type = 'Data Transfer Object';
 
    protected function getStub(): string
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );
 
        $file = $readonly ? 'dto-82.stub' : 'dto.stub';
 
        return __DIR__ . "/../../../stubs/{$file}";
    }
 
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\DataObjects";
    }
}