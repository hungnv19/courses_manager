@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Language /</span> List</h4>
    <a class="btn btn-sm btn-primary" href="{{ route('languages.create') }}">Create</a>
    <br>
    <br>
    <div class="card">
        @if ($languages->count() > 0)
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
                        @foreach ($languages as $language)
                            <tr>
                                <td class="text-center">{{ $language->id }}</td>
                                <td class="text-center">{{ $language->name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" style="  display: inline-block "
                                        href="{{ route('languages.edit', $language->id) }}">Edit</a>
                                    <form action="{{ route('languages.destroy', $language->id) }}" method="Post"
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
    {{ $languages->links('pagination::bootstrap-5') }}
@endsection
