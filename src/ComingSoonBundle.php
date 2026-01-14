<?php 
namespace OSW3\ComingSoon;

use Symfony\Component\Routing\RouterInterface;
use OSW3\ComingSoon\DependencyInjection\Configuration;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ComingSoonBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $projectDir = $container->getParameter('kernel.project_dir');


        // Generate the YAML bundle configuration file in the project
        // --
        
        (new Configuration)->generateProjectConfig($projectDir);
    }
}