<h2>
    {{ $job->title }} has been posted!
</h2>

<p>
    Congrats! Your job is now live and posted on our website.
</p>
<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>
