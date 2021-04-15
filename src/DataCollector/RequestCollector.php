<?php
namespace Neonunux\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Bundle\FrameworkBundle\DataCollector\AbstractDataCollector;

class RequestCollector extends AbstractDataCollector
{
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->data = [
            'lastReload' => \Date('now'),
            'acceptable_content_types' => $request->getAcceptableContentTypes(),
        ];
    }

    public static function getTemplate(): ?string
    {
        return 'data_collector/template.html.twig';
    }

    public function getLastReload()
    {
        return $this->data['lastReload'];
    }

    public function getAcceptableContentTypes()
    {
        return $this->data['acceptable_content_types'];
    }
    // public function getName(): string
    // {
    //     return 'reload.data_collector.request';
    // }
}
