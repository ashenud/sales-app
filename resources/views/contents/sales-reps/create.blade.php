@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Sales Representatives') }}
                        <a href="{{route('sales-reps.index')}}" class="btn btn-primary float-end">
                            {{ __('Back to List') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('sales-reps.store') }}" method="POST">
                            @csrf
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Sales Representative Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="telephone" class="form-label">Telephone <span class="text-danger">*</span></label>
                                    <input type="text" id="telephone" name="telephone" class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" value="{{ old('telephone') }}" required>
                                    @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="joined_date" class="form-label">Joined Date <span class="text-danger">*</span></label>
                                    <input type="date" max="{{date('Y-m-d')}}" id="joined_date" name="joined_date" class="form-control {{ $errors->has('joined_date') ? 'is-invalid' : '' }}" value="{{ old('joined_date') }}" required>
                                    @if ($errors->has('joined_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('joined_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="route_id" class="form-label">Current Route <span class="text-danger">*</span></label>
                                    <select id="route_id" name="route_id" class="form-select {{ $errors->has('route_id') ? 'is-invalid' : '' }}">
                                        <option value="">Open this select menu</option>
                                        @foreach ($routes as $route)
                                            <option  value="{{ $route->id }}" 
                                                {{ old('route_id') == $route->id ? 'selected'  : '' }}>
                                                {{ $route->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('route_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('route_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>                            
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label for="comments" class="form-label">Comments <span class="text-danger">*</span></label>
                                    <textarea id="comments" name="comments" class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" placeholder="Leave a comment here">{{old('comments')}}</textarea>
                                    @if ($errors->has('comments'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary float-end mt-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection