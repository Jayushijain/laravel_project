@extends('layouts.backend_layout')

@section('content')

 <div class="row">
   <div class="col-lg-12">
     <div class="panel panel-primary" data-collapsed="0">
       <div class="panel-heading">
         <div class="panel-title">
            Edit Profile
         </div>
       </div>
       <div class="panel-body">
         <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
         	{{ method_field('patch') }}
			    {{ csrf_field() }}

           <div class="form-group">
             <label for="name" class="col-sm-3 control-label">Name</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $user->name }}" required>
             </div>
           </div>
           <div class="form-group">
             <label for="email" class="col-sm-3 control-label">Email</label>
             <div class="col-sm-7">
               <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}" required>
             </div>
           </div>
           <div class="form-group">
             <label for="address" class="col-sm-3 control-label">Address</label>
             <div class="col-sm-7">
               <textarea name="address" class="form-control" rows="8" cols="80">{{ $user->address }}</textarea>
             </div>
           </div>
           <div class="form-group">
             <label for="phone" class="col-sm-3 control-label">Phone</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $user->phone }}" required>
             </div>
           </div>
           <div class="form-group">
             <label for="website" class="col-sm-3 control-label">Website</label>
             <div class="col-sm-7">
               <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="{{ $user->website }}" required>
             </div>
           </div>
           <div class="form-group">
             <label for="about" class="col-sm-3 control-label">About</label>
             <div class="col-sm-7">
               <textarea name="about" class="form-control" rows="8" cols="80">{{ $user->about }}</textarea>
             </div>
           </div>
           @php
           	$social_links = json_decode($user->social,true);
           @endphp
           <div class="form-group">
             <label for="facebook" class="col-sm-3 control-label">Facebook Link</label>

             <div class="col-sm-5">
               <div class="input-group">
                 <input type="text" name="facebook" id = "facebook" class="form-control" placeholder="Write Down Facebook Url" value="{{ $social_links['facebook'] }}">
                 <span class="input-group-addon"><i class="entypo-facebook"></i></span>
               </div>
             </div>
           </div>
           <div class="form-group">
             <label for="twitter" class="col-sm-3 control-label">Twitter Link</label>
             <div class="col-sm-5">
               <div class="input-group">
                 <input type="text" name="twitter" id = "twitter" class="form-control" placeholder="Write Down Twitter Url" value="{{ $social_links['twitter'] }}">
                 <span class="input-group-addon"><i class="entypo-twitter"></i></span>
               </div>
             </div>
           </div>
           <div class="form-group">
             <label for="linkedin" class="col-sm-3 control-label">Linkedin Link</label>

             <div class="col-sm-5">
               <div class="input-group">
                 <input type="text" name="linkedin" id = "linkedin" class="form-control" placeholder="Write Down Linkedin Url" value="{{ $social_links['linkedin'] }}">
                 <span class="input-group-addon"><i class="entypo-linkedin"></i></span>
               </div>
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-3 control-label">User Image</label>
             <div class="col-sm-7">
               <div class="fileinput fileinput-new" data-provides="fileinput">
                 <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                   <img src="{{ asset('uploads/user_image/'.$user->id.'.jpg') }}" alt="...">
                 </div>
                 <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                 <div>
                   <span class="btn btn-white btn-file">
                     <span class="fileinput-new">Select Image</span>
                     <span class="fileinput-exists">Change</span>
                     <input type="file" name="user_image" accept="image/*">
                   </span>
                   <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
             <button type="submit" class="btn btn-info">Update Profile</button>
             <button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
           </div>
         </form>
       </div>
     </div>
   </div><!-- end col-->
 </div>

 <div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Update Password
        </div>
      </div>
      <div class="panel-body">
                <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                  {{ method_field('patch') }}
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="current_password" class="col-sm-3 control-label">Current Password</label>
                    <div class="col-sm-7">
                      <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password" required>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="new_password" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-7">
                      <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password" required>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-7">
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" onchange="return checkPassword();" required>
                    </div>
                  </div>

                  <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                    <button type="submit" class="btn btn-info">Update Password</button>
                  </div>
                </form>
      </div>
    </div>
  </div><!-- end col-->
</div>
@stop

@section('scripts')

<script type="text/javascript">

function checkPassword()
  {
    var password=$("#new_password").val();
    var cpassword=$("#confirm_password").val();

    if(password != cpassword)
    {
      if(!$("#confirm_password").parent().parent().hasClass("has-error"))
      {
        $("#confirm_password").parent().parent().addClass("has-error");
        $("#confirm_password").parent().append('<span class="help-block" id="span-error">Confirm password value must match password value</span>');
        return false;
      }
    }
    // else
    // {
    //   $("#confirm_password").parent().parent().removeClass("has-error help-block");
    //   $("#span-error").remove();
    //   return true;
    // }
    return true;
  }
</script>
  @stop