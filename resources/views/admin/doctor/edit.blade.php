@extends('admin.partials.includes.base')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
    @include('includes.errors.custom')
    <div class="box">
        <div class="box-header bg-info text-uppercase text-white">{{ __('Edit Dr Information') }}</div>
        <div class="box-body">
                <form action="{{ route('admin.doctor.update', ['id'=>$doctor->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 form-label text-md-right">{{ __('Email Address') }}</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" value="{{ $doctor->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 form-label">{{ __('Phone') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" value="{{ $doctor->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="type" class="col-md-4 form-label">{{ __('Doctor Type') }}</label>
                            <div class="col-md-8">
                                <select name="type" class="form-control" id="">
                                    @if($doctor->type === 'permanent')
                                        <option value="{{ $doctor->type }}">{{ $doctor->type }}</option>
                                        <option value="trainee">Trainee Doctor</option>
                                        <option value="visiting">Visiting Doctor</option>
                                    @endif
                                    @if($doctor->type === 'trainee')
                                        <option value="{{ $doctor->type }}">{{ $doctor->type }}</option>
                                        <option value="permanent">Permanent Doctor</option>
                                        <option value="visiting">Visiting Doctor</option>
                                    @endif
                                    @if($doctor->type === 'visiting')
                                        <option value="{{ $doctor->type }}">{{ $doctor->type }}</option>
                                        <option value="permanent">Permanent Doctor</option>
                                        <option value="trainee">Trainee Doctor</option>
                                    @endif
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="avartar" class="col-md-4 form-label text-md-right">{{ __('Passport Photo') }}</label>
                        <div class="col-md-8">
                            <input type="file" name="avartar">
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-sm btn-success" type="submit">
                            <i class="fa fa-send"></i> {{ __('Update') }}
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm pull-right">
                            <i class="fa fa-window-close"></i> Cancel
                        </a>
                    </div>
                </form>
        </div>
        <div class="box-footer">
            <!-- footer content go here -->
        </div>
    </div>
</div>
    <div class="col-md-2"></div>
@endsection