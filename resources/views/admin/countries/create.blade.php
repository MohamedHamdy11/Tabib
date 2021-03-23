@extends('admin.index')
@section('content')

<section class="content-header">

  <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
  </div>

  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
    <li><a href="{{ route('countries.index') }}"> @lang('site.countries')</a></li>
    <li class="active">@lang('site.add')</li>
  </ol>

</section>

<section class="content">
    <div class="box box-primary">

      <div class="box-header">
          <h3 class="box-title">@lang('site.add')</h3>
      </div><!-- end of header -->

      <div class="box-body">

          <form action="{{ route('countries.store') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('post') }}

            @foreach(config('translatable.locales') as $locale)
               <div class="col-6 col-xs-12">
                 <div class="form-group">
                    <label for="{{$locale}}.country_name">@lang('site.' . $locale. '.country_name')</label>
                     <input type="text" id="{{$locale}}.country_name" name="{{$locale}}[country_name]"
                        class="form-control"
                        placeholder="@lang('site.' . $locale . '.country_name')"
                        value="{{old($locale.'.country_name')}}">
                  </div>
               </div>
            @endforeach

            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                
            </div>

          </form><!-- end of form -->

      </div>

    </div> <!-- end of box -->

</section><!-- end of content -->

@endsection
