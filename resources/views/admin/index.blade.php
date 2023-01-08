@extends('admin.layouts.master');
@inject('clients' , 'App\Models\Client')
@inject('governoretes', 'App\Models\Governorate')
@inject('cities' , 'App\Models\City')
@inject('categories' , 'App\Models\Category')
@inject('posts' , 'App\Models\Post')
@inject('donations' , 'App\Models\DonationRequest')
@inject('contacts' , 'App\Models\Contact')
@inject('bloodTypes' , 'App\Models\BloodType')
@section('main-pageName') Home @endsection
@section('pageName') Statistics @endsection
@section('content')
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $cities->count() }}</h3>
                <p>Cities</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-city"></i>
              </div>
              <a href="{{ route('cities.index') }}" class="small-box-footer">More info
                   <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $governoretes->count() }}</h3>
                <p>Governorates</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="{{ route('governorates.index') }}" class="small-box-footer">More info
                  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $clients->count() }}</h3>
                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('clients.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ $contacts->count() }}</h3>
                <p>Messages</p>
              </div>
              <div class="icon">
                <i class="nav-icon far fa-envelope"></i>
              </div>
              <a href="{{ route('contacts.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $categories->count() }}</h3>
                <p>Categories</p>
              </div>
              <div class="icon">
                  <i class="fa-solid fa-server"></i>
              </div>
              <a href="{{ route('categories.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $posts->count() }}</h3>
                <p>Posts</p>
              </div>
              <div class="icon">
                 <i class="fa-solid fa-copy"></i>
              </div>
              <a href="{{ route('posts.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $donations->count() }}</h3>
                <p>Donations</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-heart-circle-plus"></i>
              </div>
              <a href="{{ route('donations.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
 