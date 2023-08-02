@php
    use App\Enums\PublicStatus;
@endphp
@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Question /</span> List</h4>
    <a class="btn btn-sm btn-primary" href="{{ route('section.question.create', $section->id) }}">Create</a>
    <br>
    <br>
    <div class="card">
        @if ($questions->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Question</th>

                            <th class="text-center">Status</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($questions as $question)
                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td class="text-center">{{ $question->question }}</td>

                                <td class="text-center">{{ PublicStatus::getDescription($question->status) }}</td>
                                <td class="text-center">

                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" type="button"
                                                href="{{ route('section.question.edit', ['section' => $section->id, 'question' => $question->id]) }}"><i
                                                    class="fa fa-eye"></i>
                                                Edit</a>
                                            <a class="dropdown-item" type="button"
                                                href="{{ route('section.question.show', ['section' => $section->id, 'question' => $question->id]) }}"><i
                                                    class="fa fa-list-ul"></i>
                                                Detail</a>
                                            <form
                                                action="{{ route('section.question.destroy', ['section' => $section->id, 'question' => $question->id]) }}"
                                                method="Post">
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
    {{ $questions->links('pagination::bootstrap-5') }}
@endsection
