<div class="row hidden-print" style="margin-left:0px; margin-right:0px;">

	<div class="col-md-12 col-sm-12 clearfix " style="background-color:#ffffff; box-shadow: 0px 10px 30px 0px rgba(82,63,105,0.08); border-radius: 5px;">
		<ul class="list-inline links-list pull-left" style="margin-top:9px;">
			<li>
				<a href="{{-- {{ route('index') }} --}}" target="_blank">
					<i class="entypo-paper-plane"></i> Website
				</a>
			</li>
		</ul>


		<!-- Profile Info -->
		<ul class="user-info pull-right pull-none-xsm" style="margin-top: 6px;">
			<li class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{  getPhoto(Auth::user()->id) }}" alt="" class="img-circle" width="44">
					{{ ucwords(Auth::user()->name) }}

					<div style="margin-top: -15px;
							    font-size: 10px;
							    text-align: left;
							    padding-left: 53px;
							    color: #707696;">
						<p style="margin-top: 0px">{{ Auth::user()->role->name  }}</p>
					</div>
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Settings sub-links -->
					@if (strtolower(Auth::user()->role->name) == 'admin')
						<li>
								<a href="<?php //echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
	                  <i class="flaticon-rotate"></i>
	                  <span>Settings</span>
	              </a>
						</li>
          			@endif

					<!-- Profile sub-links -->
					<li>
						<a href="">
							<i class="flaticon-rotate"></i>
							Edit Profile
						</a>
					</li>

					<li>
						<a href="">
							<i class="flaticon-lock"></i>
							Change Password
						</a>
					</li>

					<li>
						<a href="">
							<i class="flaticon-paper-plane-1"></i>
							Logout
						</a>
					</li>

				</ul>
			</li>

		</ul>
	</div>

</div>

<hr style="margin-top:0px;"/>
