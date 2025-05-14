@extends ('layouts.layout')

@section('content')

    <a class="btn btn-success my-3" href="{{ route('category.create') }}" target="_blank">Create</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Title
                </td>
                <td>
                    Options
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>
                        {{ $c->id }}
                    </td>
                    <td>
                        {{ $c->title }}
                    </td>  
                    <td>
                        <a class="btn btn-primary mt-2" href="{{ route('category.edit', $c) }}">Edit</a>
                        <a class="btn btn-primary mt-2" href="{{ route('category.show', $c) }}">Show</a>
                        <form action="{{ route('category.destroy', $c) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

@endsection 