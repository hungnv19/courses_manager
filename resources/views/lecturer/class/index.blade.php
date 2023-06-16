@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Classes /</span> List</h4>
    <a class="btn btn-sm btn-primary" href="{{ route('classes.create') }}">Create</a>
    <br>
    <br>
    <div class="card">
        @if ($classes->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Departments Name</th>
                            <th class="text-center">Created</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($classes as $class)
                            <tr>
                                <td class="text-center">
                                    {{ $class->id }}
                                </td>
                                <td class="text-center">
                                    {{ $class->name }}
                                </td>
                                <td class="text-center">{{ $class->courses_title }}</td>
                                <td class="text-center">{{ $class->departments_name }}</td>
                                <td class="text-center">{{ $class->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" style="  display: inline-block "
                                        href="{{ route('classes.edit', $class->id) }}">Edit</a>
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="Post"
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
                            <th class="text-center">Course Name</th>
                            <th class="text-center">Departments Name</th>
                            <th class="text-center">Created</th>
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
    {{ $classes->links('pagination::bootstrap-5') }}
@endsection
