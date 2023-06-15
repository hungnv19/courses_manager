@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> List</h4>
    {{-- <a class="btn btn-sm btn-primary" href="{{ route('levels.create') }}">Create</a>
    <br>
    <br> --}}
    <div class="card">

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Created</th>
                        <th colspan="2" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a class="" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="" href=""><i class="bx bx-trash me-1"></i> Delete</a>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
