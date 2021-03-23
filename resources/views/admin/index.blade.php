@include('admin.layouts.header')
@include('admin.layouts.navbar')

<div class="content-wrapper">
    {{--  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      {{--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>@lang('site.Home')</a></li>
        <li class="active">@lang('site.Dashboard')</li>
      </ol>  
    </section>  --}}

        <!-- Main content -->
        <section class="content">
            @include('admin.layouts.message')
            @yield('content')
        </section>
        <!-- /.content -->
</div>


@include('admin.layouts.footer')
