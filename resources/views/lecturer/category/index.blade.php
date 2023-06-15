@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> List</h4>
    <div class="card">
        @if ($categories->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td class="text-center">{{ $category->name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" style="  display: inline-block "
                                        href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="Post"
                                        style=" margin-left: 10px; display: inline-block ">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <br>
            <data-empty></data-empty>
        @endif
    </div>
    <br>
    {{ $categories->links('pagination::bootstrap-5') }}
@endsection
