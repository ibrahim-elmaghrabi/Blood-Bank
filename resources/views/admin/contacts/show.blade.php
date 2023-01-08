@extends('admin.layouts.master')
@section('main-pageName') Inbox   @endsection
@section('pageName')  View  @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Mail From : <strong>{{ $contact->name }}</strong></h3>
            </div>
                <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5>Name : {{ $contact->name }} </h5>
                            <h6>From : {{ $contact->email }}
                                <span class="mailbox-read-time float-right">
                                    <strong>{{  $contact->created_at  }}</strong>
                                </span>
                            </h6>
                            <h6>Phone : {{ $contact->phone }} </h6>
                        </div>
                        <div class="mailbox-read-message">
                            <p>Subject : {{ $contact->subject }}</p>
                            <p>Message:</p>
                            <p>{{ $contact->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
  