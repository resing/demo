<?php

namespace App\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class HttpDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = [
            'curl_request' => $this->forgeRequest($request),
            'request' => $request->__toString(),
            'files' => implode(', ', array_map(function($file) { return $file->getClientOriginalName(); } , $request->files->all())),
            'response' => $response->__toString()
        ];
    }

    public function getName()
    {
        return 'app.http';
    }

    public function getCurlRequest()
    {
        return $this->data['curl_request'];
    }

    public function getFiles()
    {
        return $this->data['files'];
    }

    public function getRequest()
    {
        return $this->data['request'];
    }

    public function getResponse()
    {
        return $this->data['response'];
    }
    private function forgeRequest(Request $request)
    {
        $curlRequest = 'curl -X ' . $request->getMethod() . ' http://' . $request->server->get('HTTP_HOST') . $request->getRequestUri();

        foreach ($request->headers as $name => $header) {
            $curlRequest .=  ' -H "'. $name . ': ' . $header[0] .'"';
        }

        return $curlRequest;
    }

    /**
     * @inheritDoc
     */
    public function reset()
    {
        // TODO: Implement reset() method.
    }
}
