@extends('layouts.backend_layout')

@section('content')

@php
$social_links = json_decode(get_frontend_settings('social_links'), true);
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Frontend Settings
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('frontend.update') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <label for="banner_title" class="col-sm-3 control-label">Banner Title</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="Banner Title" value="{{ get_frontend_settings('banner_title') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="banner_sub_title" class="col-sm-3 control-label">Banner Sub Title</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="banner_sub_title" id="banner_sub_title" placeholder="Banner Sub Title" value="{{  get_frontend_settings('banner_sub_title') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slogan" class="col-sm-3 control-label">Slogan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Slogan" value="{{ get_frontend_settings('slogan') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="about_us" class="col-sm-3 control-label">About Us</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="about_us" name="about_us" id="about_us">{!! htmlspecialchars_decode(get_frontend_settings('about_us')) !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="terms_and_condition" class="col-sm-3 control-label">Terms And Condition</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="terms_and_condition" name="terms_and_condition" id="terms_and_condition">{!!htmlspecialchars_decode(get_frontend_settings('terms_and_condition')) !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="privacy_policy" class="col-sm-3 control-label">Privacy Policy</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="privacy_policy" name="privacy_policy" id="privacy_policy">{!! htmlspecialchars_decode(get_frontend_settings('privacy_policy')) !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="faq" class="col-sm-3 control-label">Faq</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="faq" name="faq" id="faq">{!! htmlspecialchars_decode(get_frontend_settings('faq')) !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="col-sm-3 control-label">Facebook Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="facebook" id = "facebook" class="form-control" placeholder="Write Down Facebook Link" value="{{ $social_links['facebook'] }}">
                                <span class="input-group-addon"><i class="entypo-facebook"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-3 control-label">Twitter Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="twitter" id = "twitter" class="form-control" placeholder="Write Down Twitter Link" value="{{ $social_links['twitter'] }}">
                                <span class="input-group-addon"><i class="entypo-twitter"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkedin" class="col-sm-3 control-label">Linkedin Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="linkedin" id = "linkedin" class="form-control" placeholder="Write Down Linkedin Link" value="{{ $social_links['linkedin'] }}">
                                <span class="input-group-addon"><i class="entypo-linkedin"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="google" class="col-sm-3 control-label">Google Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="google" id = "google" class="form-control" placeholder="Write Down Google Link" value="{{ $social_links['google'] }}">
                                <span class="input-group-addon"><i class="entypo-google-circles"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="col-sm-3 control-label">Instagram Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="instagram" id = "instagram" class="form-control" placeholder="Write Down Instagram Link" value="{{ $social_links['instagram'] }}">
                                <span class="input-group-addon"><i class="entypo-instagram"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pinterest" class="col-sm-3 control-label">Pinterest Link</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="pinterest" id = "pinterest" class="form-control" placeholder="Write Down Pinterest Link" value="{{ $social_links['pinterest'] }}">
                                <span class="input-group-addon"><i class="entypo-pinterest"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info">Update Frontend</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Banner Image<small>&nbsp;( 1400 X 950 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('image.update','banner_image') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
				{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="{{ asset('/uploads/system/home_banner.jpg') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="banner_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Light Logo<small>( 330 X 70 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('image.update','light_logo') }}" method="get" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="{{ asset('/global/light_logo.png') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="light_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Dark Logo <small>( 330 X 70 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('image.update','dark_logo') }}" method="get" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="{{ asset('/global/dark_logo.png') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="dark_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Small Logo <small>( 49 X 58 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('image.update','small_logo') }}" method="get" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="{{ asset('/global/small_logo.png') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="small_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Update Favicon <small>( 90 X 90 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{ route('image.update','favicon') }}" method="get" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="{{ asset('/global/favicon.png') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="favicon" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>




@stop

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {
    initCKEditor(['about_us', 'terms_and_condition', 'privacy_policy', 'faq']);
});
</script>
@stop