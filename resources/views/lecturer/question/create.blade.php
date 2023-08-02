@extends('lecturer.layout.lecturer')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Question /</span> Create</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create Question</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('section.question.store', $section) }}" ref="formData"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Question Name <span
                                    class="required-label"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Enter Question Name" name="question" />
                                @error('question')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Explanation <span
                                    class="required-label"> *</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="basic-default-name" placeholder="Enter Explanation" name="explanation"
                                    rows="5"></textarea>
                                @error('explanation')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Status <span
                                    class="required-label"> *</span></label>
                            <div class="col-sm-10">
                                <select name="status" value="{{ old('status') }}" class="form-control"
                                    style="width: 200px;">
                                    <option value disabled selected>-----Choose Status-----</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Private</option>
                                </select>
                                @error('status')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label" for="basic-default-name">A :
                            </label>
                            <div class="col-sm-1 col-form-label">

                                <input type="hidden" value="0" name="answers[0][checked]" />
                                <input type="checkbox" name="answers[0][checked]" class="form-check-input"
                                    value="1" />
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Enter Answer" value="{{ old('answers.0.answer') }}"
                                    name="answers[0][answer]" />
                                @error('answers.0.answer')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label" for="basic-default-name">B :
                            </label>
                            <div class="col-sm-1 col-form-label">
                                <input type="hidden" value="0" name="answers[1][checked]" />
                                <input type="checkbox" name="answers[1][checked]" class="form-check-input"
                                    value="1" />
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Enter Answer " name="answers[1][answer]"
                                    value="{{ old('answers.1.answer') }}" />
                                @error('answers.0.answer')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label" for="basic-default-name">C :
                            </label>
                            <div class="col-sm-1 col-form-label">
                                <input type="hidden" value="0" name="answers[2][checked]" />
                                <input type="checkbox" name="answers[2][checked]" class="form-check-input"
                                    value="1" />
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Enter Answer" name="answers[2][answer]"
                                    value="{{ old('answers.2.answer') }}" />
                                @error('answers.0.answer')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-1 col-form-label" for="basic-default-name">D :
                            </label>
                            <div class="col-sm-1 col-form-label">
                                <input type="hidden" value="0" name="answers[3][checked]" />
                                <input type="checkbox" name="answers[3][checked]" class="form-check-input"
                                    value="1" />
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Enter Answer" name="answers[3][answer]"
                                    value="{{ old('answers.3.answer') }}" />
                                @error('answers.0.answer')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('section.index') }}" class="btn btn-outline-secondary"
                                    style="margin-left: 10px">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
