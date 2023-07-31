@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Courses - Classes</h4>

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
                                <td class="text-center">{{ $course->categories_name }}</td>
                                <td class="text-center">{{ $course->languages_name }}</td>
                                <td class="text-center">{{ $course->levels_name }}</td>
                                <td class="text-center">{{ $course->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" style="  display: inline-block "
                                        href="{{ route('courses.edit', $course->id) }}">Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="Post"
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
