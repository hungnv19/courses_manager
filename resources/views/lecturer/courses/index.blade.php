@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> List</h4>
    <a class="btn btn-sm btn-primary" href="{{ route('classes.courses.create', $class->id) }}">Create</a>
    <br>
    <br>
    <div class="card">
        @if ($courses->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Language</th>
                            <th class="text-center">Level</th>
                            <th class="text-center">Created</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($courses as $course)
                            <tr>
                                <td class="text-center">
                                    {{ $course->id }}
                                </td>
                                <td class="text-center">
                                   {{ $course->title }}

                                </td>
                                <td class="text-center">
                                    <img src=" {{ Storage::url($course->image) }}"
                                        style="width: 60px; height: 60px; object-fit: cover" />
                                </td>
                                <td class="text-center">
                                    {{ $course->categories_name }}
                                </td>
                                <td class="text-center">
                                    {{ $course->languages_name }}
                                </td>
                                <td class="text-center">
                                    {{ $course->levels_name }}
                                </td>
                                <td class="text-center">
                                    {{ $course->created_at }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item"
                                                type="button"href="{{ route('classes.courses.edit', ['class' => $class->id, 'course' => $course->id]) }}"><i
                                                    class="fa fa-eye"></i>   Edit</a>
                                            <form action="{{ route('classes.courses.destroy', ['class' => $class->id, 'course' => $course->id]) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>   Delete
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
                            <th class="text-center">Title</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Language</th>
                            <th class="text-center">Level</th>
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
    {{ $courses->links('pagination::bootstrap-5') }}
@endsection
