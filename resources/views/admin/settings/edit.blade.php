@extends('admin.layouts.master')
@section('main-pageName') Settings   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Apllication Settings</h3>
              </div>
                {{ Form::model($setting, ['method'=> 'PUT', 'route'=> ['settings.update', 1 ]]) }}
                <div class="card-body">
                  <div class="form-group">
                    {{ Form::label('notification_settings_text', 'Notitcation Description' ) }}
                    {{ Form::textarea('notification_settings_text',
                          $setting->notification_settings_text, ['class'=> 'form-control'] ) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('about_app', 'About App') }}
                    {{ Form::textarea('about_app', $setting->about_app, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('who_we_are', 'Who We Are Text') }}
                    {{ Form::textarea('about_app', $setting->who_we_are, ['class'=> 'form-control']) }}
                  </div>
                   <div class="form-group">
                     {{ Form::label('Phone', 'Phone') }}
                     {{ Form::text('phone', $setting->Phone, ['class'=> 'form-control']) }}
                  </div>
                   <div class="form-group">
                     {{ Form::label('email', 'Email') }}
                     {{ Form::text('email', $setting->email, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('fax', 'Fax') }}
                    {{ Form::text('fax', $setting->fax, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                     {{ Form::label('facebook', 'Facebook Link') }}
                     {{ Form::text('fd_link', $setting->fd_link, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                     {{ Form::label('instagarm', 'Instagarm Link') }}
                     {{ Form::text('insta_link', $setting->insta_link, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                     {{ Form::label('twitter', 'Twitter Link') }}
                     {{ Form::text('tw_link', $setting->tw_link, ['class'=> 'form-control']) }}
                  </div>
                   <div class="form-group">
                     {{ Form::label('wattsapp', 'Whats App Link') }}
                     {{ Form::text('wta_link', $setting->wta_link, ['class'=> 'form-control']) }}
                  </div>
                   <div class="form-group">
                    {{ Form::label('YouTubeLink', 'YouTube Link') }}
                    {{ Form::text('yt_link', $setting->yt_link, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('playstore', 'PlayStore Link') }}
                    {{ Form::text('playstore', $setting->play_store_link, ['class'=> 'form-control']) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('appstore', 'AppStore Link') }}
                    {{ Form::text('appstore', $setting->app_store_link, ['class'=> 'form-control']) }}
                  </div>
                  </div>
                </div>
                <div class="card-footer">
                  {{ Form::submit('Update' , ['class' => 'btn btn-primary']) }}
                </div>
              {{ Form::close()}}
             </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
@section('scripts')
@endsection