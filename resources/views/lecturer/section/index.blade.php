@php
    use App\Enums\PublicStatus;
@endphp
@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Section /</span> List</h4>
    <a class="btn btn-sm btn-primary" href="{{ route('section.create') }}">Create</a>
    <br>
    <br>
    <div class="card">
        @if ($sections->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Questions</th>
                            <th class="text-center">Status</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($sections as $section)
                            <tr>
                                <td class="text-center">{{ $section->id }}</td>
                                <td class="text-center">{{ $section->name }}</td>
                                <td class="text-center">dd</td>
                                <td class="text-center">{{ PublicStatus::getDescription($section->status) }}</td>
                                <td class="text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" type="button"
                                                href="{{ route('section.edit', $section->id) }}"><i class="fa fa-eye"></i>
                                                Edit</a>

                                            <form action="{{ route('section.destroy', $section->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
                            <th class="text-center">Questions</th>
                            <th class="text-center">Status</th>
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
    {{ $sections->links('pagination::bootstrap-5') }}
@endsection
