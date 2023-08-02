@php
    use App\Enums\PublicStatus;
@endphp
@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Question /</span> Detail</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Detail Question</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="row mb-3 ">
                            <label class="col-sm-6 col-form-label" for="basic-default-name">Item</label>
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Details</label>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Question :</label>
                            </div>
                            <div class="col-sm-6">
                                <span>{{ $question->question }}</span>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Explanation :</label>
                            </div>
                            <div class="col-sm-6">
                                <span>{{ $question->explanation }}</span>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Status :</label>
                            </div>
                            <div class="col-sm-6">
                                <span>{{ PublicStatus::getDescription($question->status) }}</span>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Details :</label>
                            </div>
                            <div class="col-sm-6">
                                <span>{{ $question->section->name }}</span>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Created By :</label>
                            </div>
                            <div class="col-sm-6">
                                <span>{{ $question->user->name }}</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="row mb-3 ">
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Answer</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="col-form-label">Choice</label>
                            </div>
                        </div>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($answers as $answer)
                                <div class="row mb-3 ">
                                    <div class="col-sm-6">
                                        <span>{{ $answer->answer }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>
                                            <div
                                                class="@if ($answer->checked == '1') alert alert-success @endif alert alert-light ">
                                                {{ $answer->checked == '1' ? 'Correct' : 'Wrong' }}</div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
