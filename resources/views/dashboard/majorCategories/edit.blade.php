@extends('layouts.dashboard.app')
<?php
$page = 'majorCategories';
$title = trans('dash.majorCategories');
?>
@section('title_page')
    {{ $title }}
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ $title }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.Dashboard')</a></li>
                <li><a href="{{ route('dashboard.majorCategories.index') }}"> @lang('site.section')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>
        <section class="content">
            <div class="">
                {{-- <div class="box-header">
                <h3 class="box-title">@lang('site.edit')</h3>
            </div><!-- end of box header -->
            --}}
                <div class="box-body">
                    @include('partials._errors')
                    <form action="{{ route('dashboard.majorCategories.update', $majorCategory->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <div class="col-md-6">
                            <!-- /one -->
                            <div class="box box-primary ">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><strong>SITE</strong> INFO</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body ">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>@lang('dash.type') </label>
                                            <select name="type" id="" class="form-control">
                                                @foreach (majorTypes() as $item)
                                                    <option {{ $item == $majorCategory->type ? 'selected' : '' }}
                                                        value="{{ $item }}">
                                                        @lang('site.' . $item) </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @foreach (config('translatable.locales') as $key => $locale)
                                            <div class="form-group">
                                                <span class="label label-warning  ">{{ $key + 1 }} </span>
                                                <label>@lang('dash.' . $locale . '.title_site')</label>
                                                <input type="text" name="{{ $locale }}[title]"
                                                    class="form-control"
                                                    value="{{ $majorCategory->translate($locale)->title }}">
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            <label>@lang('dash.rank')</label>
                                            <input type="number" name="rank" class="form-control"
                                                value="{{ $majorCategory->rank }}">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('dash.status') </label>
                                            <select name="status" required="required" class="form-control">
                                                <option value="">@lang('dash.select')</option>
                                                @foreach (activeOrinactive() as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $majorCategory->status == $item ? 'selected' : '' }}>
                                                        {{ __('dash.' . $item) }}

                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>{{-- end col md  --}}
                        <div class="col-md-12">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-edit"></i>
                                    @lang('site.edit')</button>
                            </div>
                        </div>
                    </form><!-- end of form -->
                </div><!-- end of box body -->
            </div><!-- end of box -->
        </section><!-- end of content -->
    </div><!-- end of content wrapper -->
@endsection
