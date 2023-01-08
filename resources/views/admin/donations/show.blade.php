@extends('admin.layouts.master')
@push('css')
<!-- BS Stepper -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('assets/dist/css/adminlte.min.css')}}">
@endpush
@section('main-pageName')  Donation Request  @endsection
@section('pageName')  View  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Donation Request </h3>
              </div>
                <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab"
                                     aria-controls="logins-part" id="logins-part-trigger">
                         <i class="fa-solid fa-heart-circle-plus"></i>
                        <span class="bs-stepper-label">Dnation Request</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab"
                                   aria-controls="information-part" id="information-part-trigger">
                            <i class="fa-solid fa-heart-circle-plus"></i>
                        <span class="bs-stepper-label"></span>
                      </button>
                    </div>
                  </div>
                <form>
                <div class="card-body">
                <div class="row">
                    <div class="col">
                         {{ Form::label('name' , 'Client Name') }}
                         {{ Form::text('name',$donationRequest->client->name,
                              ['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                    <div class="col">
                         {{ Form::label('id' , 'Client ID') }}
                         {{ Form::text('id' ,$donationRequest->client_id ,['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                </div>
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab"
                                  aria-controls="logins-part" id="logins-part-trigger">
                            <i class="fa-solid fa-heart-circle-plus"></i>
                        <span class="bs-stepper-label">Dnation Request</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab"
                                   aria-controls="information-part" id="information-part-trigger">
                            <i class="fa-solid fa-heart-circle-plus"></i>
                        <span class="bs-stepper-label"></span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ Form::label('name' , 'Name') }}
                        {{ Form::text('name', $donationRequest->name,
                                ['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                    <div class="col">
                        {{ Form::label('age' , 'Age') }}
                        {{ Form::text('age', $donationRequest->age ,['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ Form::label('phone' , 'Phone') }}
                        {{ Form::text('phone' , $donationRequest->phone ,['class' => 'form-control' , 'disabled']) }}
                    </div>
                    <div class="col">
                        {{ Form::label('loaction' , 'Location') }}
                        {{ Form::text('loaction',
                            $donationRequest->city->name.','.$donationRequest->city->governorate->name,
                            ['class' => 'form-control' , 'disabled' ] ) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{ Form::label('bloodType' , 'Blood Type') }}
                        {{ Form::text('bloodType',
                              $donationRequest->bloodType->name,
                              ['class' => 'form-control' , 'disabled']) }}
                    </div>
                    <div class="col">
                        {{ Form::label('bags' , 'Bags number') }}
                        {{ Form::text('bags',
                            $donationRequest->bags_num,
                            ['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                </div>
                <div class="form-group">
                  {{ Form::label('Hospital Name' , 'Hospital Name') }}
                  {{ Form::text('name',
                        $donationRequest->hospital_name,
                        ['class' => 'form-control' , 'disabled']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('addres', 'Hospital Address') }}
                  {{ Form::text('address',
                      $donationRequest->hospital_address,
                      ['class' => 'form-control' , 'disabled'] ) }}
                  </div>
                <div class="form-group">
                  {{ Form::label('Details' , 'Details') }}
                  {{ Form::textarea('details',
                        $donationRequest->details,
                        ['class' => 'form-control' , 'disabled'] ) }}
                </div>
                <div class="row">
                    <div class="col">
                      {{ Form::label('Latitude' ,'Latitude') }}
                      {{ Form::text('Latitude',
                            $donationRequest->latitude,
                            ['class' => 'form-control' , 'disabled'] ) }}
                    </div>
                    <div class="col">
                      {{ form::label('Longitude' , 'Longitude') }}
                      {{ Form::text('Longitude',
                            $donationRequest->longitude,
                            ['class' => 'form-control' , 'disabled']) }}
                     </div>
                    </div>
                  </div>
                </div>
              </form>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 