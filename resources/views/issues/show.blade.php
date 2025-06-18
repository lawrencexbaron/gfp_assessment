<a href="{{ route('issues.index') }}">← Back to Issues</a>

<h2>#{{ $issue['number'] }} - {{ $issue['title'] }}</h2>
<p><strong>Created:</strong> {{ \Carbon\Carbon::parse($issue['created_at'])->toDayDateTimeString() }}</p>
<p>{{ $issue['body'] }}</p>