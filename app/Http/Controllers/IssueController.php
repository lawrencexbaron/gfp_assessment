<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function __construct(
        protected GitHubService $gitHubService
    ) {}

    public function index()
    {
        $issues = $this->gitHubService->getOpenAssignedIssues();
        return view('issues.index', compact('issues'));
    }

    public function show(string $encodedUrl)
    {
        $apiUrl = base64_decode($encodedUrl);

        $issue = $this->gitHubService->getIssueDetails($apiUrl);

        abort_if(is_null($issue), 404);

        return view('issues.show', compact('issue'));
    }

}
