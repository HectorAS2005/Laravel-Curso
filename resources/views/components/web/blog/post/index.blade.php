{{ $slot }}
{{ $header }}
@foreach ($posts as $p)
    <div class="card card-white mb-2">
        <h3>{{ $p->title }}</h3>
        <p>{{ $p->description }}</p>
        <a href="{{ route("web.blog.show", $p) }}">Ir</a>
    </div>

    {{ $posts->links() }}
@endforeach
{{ $extra }}

{{ $footer }}