@extends('admin.index')
@section('content')

<section class="content-header">

  <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
  </div>

  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
    <li><a href="{{ route('admins.index') }}"> @lang('site.admins')</a></li>
    <li class="active">@lang('site.add')</li>
  </ol>

</section>

<section class="content">
    <div class="box box-primary">

      <div class="box-header">
          <h3 class="box-title">@lang('site.add')</h3>
      </div><!-- end of header -->

      <div class="box-body">

          <form action="{{ route('admins.store') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}

            <div class="form-group">
              <label>@lang('site.name')</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
              <label>@lang('site.email')</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
              <label>@lang('site.password')</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <label>@lang('site.password_confirmation')</label>
              <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label>@lang('site.permissions')</label>

                <div class="nav-tabs-custom">

                  @php
                    $models = ['admins', 'categories', 'counties', 'cities', 'MedicalInformation'];
                    $maps  = ['create', 'read', 'update', 'delete'];
                  @endphp

                  <ul class="nav nav-tabs">
                    
                    @foreach ($models as $index=>$model)
                      <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' .$model)</a></li>          
                    @endforeach
            
                  </ul>
                  <div class="tab-content">
                    
                    @foreach ($models as $index=>$model)
                      <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                        @foreach ($maps as $map)
                          <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' .$map)</label>
                        @endforeach
                        
                      </div> <!-- end of tab-pane -->

                    @endforeach


                  </div><!-- end of tab content -->
                </div><!-- end of nav tabs custom -->
            </div><!-- end of form group tab -->


            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                
            </div>


          </form><!-- end of form -->

      </div>

    </div> <!-- end of box -->



</section><!-- end of content -->


{{--
<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
     {!! Form::open(['url'=>aurl('admin')]) !!}
     <div>
       {!! Form::label('name',trans('admin.name')) !!}
       {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
    </div>
    <div>
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
     </div>
     <div>
        {!! Form::label('password',trans('admin.password')) !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
     </div>
      {!! Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']) !!}
     {!! Form::close() !!}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  --}}
@endsection
