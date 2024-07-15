@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Feedback') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('feedbacks.update', $feedback->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="customer_name">{{ __('Customer Name') }}</label>
                            <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name', $feedback->customer_name) }}" required autofocus>
                            @error('customer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="feedback_date">{{ __('Feedback Date') }}</label>
                            <input id="feedback_date" type="date" class="form-control @error('feedback_date') is-invalid @enderror" name="feedback_date" value="{{ old('feedback_date', $feedback->feedback_date) }}" required>
                            @error('feedback_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="feedback_text">{{ __('Feedback Text') }}</label>
                            <textarea id="feedback_text" class="form-control @error('feedback_text') is-invalid @enderror" name="feedback_text" required>{{ old('feedback_text', $feedback->feedback_text) }}</textarea>
                            @error('feedback_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="rating">{{ __('Rating') }}</label>
                            <input id="rating" type="number" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating', $feedback->rating) }}" required min="1" max="5">
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Update Feedback') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
