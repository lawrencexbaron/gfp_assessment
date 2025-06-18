<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected string $baseUrl = 'https://api.github.com';

    public function __construct(
        protected string $token = ''
    ) {
        $this->token = env('GITHUB_PERSONAL_TOKEN');
    }

    protected function request()
    {
        return Http::withToken($this->token)->accept('application/vnd.github.v3+json');
    }

    public function getOpenAssignedIssues(): array
    {
        $response = $this->request()->get("{$this->baseUrl}/issues");

        if ($response->failed()) {
            return [];
        }

        return collect($response->json())
            ->filter(fn ($issue) => $issue['state'] === 'open')
            ->map(fn ($issue) => [
                'number' => $issue['number'],
                'title' => $issue['title'],
                'created_at' => $issue['created_at'],
                'body' => $issue['body'] ?? '',
                'url' => $issue['url'], // save full API URL to retrieve later
            ])
            ->values()
            ->toArray();
    }

    public function getIssueDetails(string $apiUrl): ?array
    {
        $response = $this->request()->get($apiUrl);


        if ($response->failed()) {
            return null;
        }

        $issue = $response->json();

        return [
            'number' => $issue['number'],
            'title' => $issue['title'],
            'created_at' => $issue['created_at'],
            'body' => $issue['body'] ?? '',
        ];
    }

}
