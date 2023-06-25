<?php

namespace Forevue\ForumMagnumSdk;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private HttpClient $httpClient;

    public function __construct(protected readonly string $endpoint)
    {
        $this->httpClient = new HttpClient([
            'base_uri' => $endpoint,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0',
            ],
        ]);
    }

    public static function eaForum(): self
    {
        return new self('https://forum.effectivealtruism.org/graphql');
    }

    public static function lessWrong(): self
    {
        return new static('https://www.lesswrong.com/graphql');
    }

    public function getPost(string $id, array $properties): ?\stdClass
    {
        $response = $this->request(
            sprintf('query GetPost($id: String) {
                post(input: { selector: { documentId: $id } }) {
                    result {
                        %s
                    }
                }
            }', GQL::toGQL($properties)),
            ['id' => $id]
        );

        $body = $response->getBody()->getContents();

        return json_decode($body, false)->data->post->result;
    }

    public function request(string $query, array $variables = []): ResponseInterface
    {
        return $this->httpClient->post('', [
            'json' => [
                'query' => $query,
                'variables' => $variables,
            ],
        ]);
    }

    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }
}
