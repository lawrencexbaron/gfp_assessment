<h1>My Open GitHub Issues</h1>

@if (!empty($issues) && is_array($issues))
    <ul>
      @foreach($issues as $issue)
        <li>
            <a href="{{ route('issues.show', base64_encode($issue['url'])) }}">
                #{{ $issue['number'] }} - {{ $issue['title'] }}
                (Created: {{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }})
            </a>
        </li>
      @endforeach
    </ul>
@else
    <p>No issues found or GitHub API error.</p>
@endif
