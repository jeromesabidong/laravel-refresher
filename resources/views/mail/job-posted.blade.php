<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job is posted on our website.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View your Job Listing.</a>
</p>