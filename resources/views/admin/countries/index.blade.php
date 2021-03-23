@extends('admin.index')
@section('content')

<div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
</div>

<div class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title" style="margin-bottom: 15px">{{ $title }}</h3>

            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search' )">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>

                        @if (admin()->user()->hasPermission('admins_create'))
                            <a href="{{ route('countries.create') }}" class="btn btn-primary"><i class="fa fa-plus "></i> @lang('site.add') </a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus "></i> @lang('site.add') </a>
                        @endif

                    </div>
                </div> <!-- end of row -->
            </form> 
        </div> <!--end of box-header -->

        <div class="box-body">

            @if ($countries->count() > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.created_at')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $index=>$country)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $country->country_name }}</td>
                                <td>{{ $country->created_at }}</td>
                                <td>
                                    @if (admin()->user()->hasPermission('admins_update'))
                                        <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-info btn-sm">@lang('site.edit')</a>
                                    @else
                                        <a href="#" class="btn btn-info btn-sm disabled">@lang('site.edit')</a>
                                    @endif

                                    @if (admin()->user()->hasPermission('admins_delete'))
                                        <form action="{{ route('countries.destroy', $country->id) }}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-sm">@lang('site.delete')</button>
                                        </form><!-- end of form -->
                                    @else
                                        <button class="btn btn-danger disabled">@lang('site.delete')</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <h2>@lang('site.no_data_found')</h2>
            @endif
        </div><!-- end of body -->

    </div>
</div>


@endsection
