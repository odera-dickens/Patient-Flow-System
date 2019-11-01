@extends('doctor.main')
@include('doctor.header')
@section('content')
    <div class="col-md-6 mb-2">
        <div class="box">
            <div class="box-header bg-info text-uppercase text-white">{{ __('reported accident emergency details on') }} <span class="text-success" style="font-weight:bold; font-size:18px; font-family:cursive">{{ $maternity_accident->patient }}</span></div>
            @include('includes.errors.custom')
            <div class="box-body">
               <form action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="patient_name" class="col-md-4 form-label text-md-right">{{ __('Patient Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="patient_name" disabled value="{{ $maternity_accident->patient }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nurse" class="col-md-4 form-label text-md-right">{{ __('Reported by Nurse') }}</label>
                        <div class="col-md-8">
                            <input type="nurse" class="form-control" disabled value="{{ $maternity_accident->nurse }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="form-label col-md-4 text-md-right">{{ __('Damage Type') }}</label>
                        <div class="col-md-8">
                            <input type="damage_type" class="form-control" disabled value="{{ $maternity_accident->status }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-md-4 form-label text-md-right">{{ __('Date Reported') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" disabled value="{{ $accident->updated_at}}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <!-- Some footer content here -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header bg-info text-uppercase text-white">{{ __('Patient Examination Section') }}</div>
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right form-label">Have you seen the patient?</label>
                        <div class="col-md-8">
                           Yes <input type="radio" value="yes" name="seen_patient" id="yes">
                           No <input type="radio" value="no" name="seen_patient" id="no">
                        </div>
                    </div>
                    <div id="doctor-response-form" style="display:none">
                        <div class="form-group row">
                            <label for="date" class="form-label col-md-4 text-md-right">{{ __('Date') }}</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" value="{{ old('date') }}" name="date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">

            </div>
        </div>
    </div>
    <script type="text/javascript">
      $(function () {
            $("#yes").click(function () {
                if ($(this).is(":checked")) {
                    $("#doctor-response-form").show();
                    //$('#profileupdateform').hide();
                } else {
                    $("#doctor-response-form").hide();
                    //$('#profileupdateform').show();
                }
            });
            });
    </script>
@endsection