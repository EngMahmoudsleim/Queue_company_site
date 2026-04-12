<h2>{{ $title }}</h2>
<ul>
    @foreach($lines as $line)
        <li>{{ $line }}</li>
    @endforeach
</ul>
