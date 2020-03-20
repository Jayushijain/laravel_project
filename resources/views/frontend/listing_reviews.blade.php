<?php
$review_details=get_reviewer_details($listing_detail['id']);
  //$reviews = get_listing_wise_review($listing_detail['id']);
  // $review = get_listing_wise_review($listing_detail['id']);
//   $reviewer = get_listing_wise_review($listing_detail['id']);
  //$rating = get_listing_wise_rating($listing_detail['id']);
//   $user_type = ""; 
if(Auth::check())
{
    $user_id = Auth::user()->id;
    //$user_name = Auth::user()->name;
    $user_type  = get_role($user_id);
}
else
{
    $user_id = 0;
    $user_type  = 3;
}
?>
    <section id="reviews">
        <h2>Reviews</h2>
        <!-- Ratings starts -->
        <div class="reviews-container add_bottom_30">
            <div class="row">
                <div class="col-lg-3">
                    <div id="review_summary">
                        <strong>
                            <?php echo  number_format((float)$rating, 1, '.', '');?>
                        </strong>
                        <em>
                            <?php
            if ($rating > 0) {
              $quality = get_rating_wise_quality($listing_detail['id']);
              echo $quality->quality;
              //echo $quality;
            }
            ?>
                        </em>
                        <small>
                            <?php echo 'based on'.' '.$reviews.' '.'reviews'; ?>
                        </small>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Rating Progeress Bar -->
                    <?php for($i = 1; $i <= 5; $i++): ?>
                    <div class="row">
                        <div class="col-lg-10 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo get_percentage_of_specific_rating($listing_detail['id'], $i); ?>%"
                                    aria-valuenow="<?php echo get_percentage_of_specific_rating($listing_detail['id'], $i); ?>"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-3">
                            <small>
                                <strong>
                                    <?php echo $i.' '.'stars'; ?>
                                </strong>
                            </small>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- Ratings ends -->

        <div class="reviews-container">
            <!-- Single Review Starts -->
            <?php //foreach($reviews as $key => $review): ?>
            <div class="review-box clearfix">
                <?php //$reviewer =  $this->db->get_where('user', array('id' => $review['reviewer_id']))->row_array(); ?>
                
                <?php
                    $file_name = 'uploads/user_image/'.$reviewer['id'].'.jpg';
                    
                    if (file_exists($file_name)) 
                    {
                ?>
                    <figure class="rev-thumb">
                        <img src="{{ asset('uploads/user_image')}}/{{$reviewer['id'].'.jpg'}}" alt="">
                    </figure>
                <?php 
                    }
                    else 
                    { 
                ?>
                    <figure class="rev-thumb">
                        <img src="{{ asset('uploads/user_image/user.png')}}" alt="">
                    </figure>
                <?php 
                    } 
                ?>
                    <div class="rev-content">
                    @foreach($review_details as $review_detail)
                        <div class="rating">
                            <?php for($i = 1; $i <= $review_detail->review_rating; $i++): ?>
                            <i class="icon_star voted"></i>
                            <?php endfor; ?>
                            <?php for($i = 1; $i <= (5-$review_detail->review_rating); $i++): ?>
                            <i class="icon_star"></i>
                            <?php endfor; ?>
                        </div>
                        <div class="rev-info">
                            {{ DB::table('users')->where('id', $review_detail->reviewer_id)->value('name')}} –
                            <?php echo date('D, d-M-Y', $review_detail->timestamp); ?>:
                        </div>
                        {{ $review_detail->review_comment}}
                        @endforeach
                        <div class="rev-text">
                            <p>
                                    
                                    
                                    <?php
                                    if($user_type == 1)
                                    {
                                    ?>
                                        <span class="p-0 m-0 float-right">
                                            <a href="javascript: void(0);" onclick="confirm_modal('admin/review_modify/delete/'<?php //$review['review_id'].'/'.$slug.'/'.$listing_id?>);" class="text-danger">
                                                <i class="icon-trash pb-2"></i>
                                            </a>
                                        </span>
                                <?php 
                                    }
                                    elseif($user_type == 2 && $user_id == $reviewer['id'])
                                    { ?>
                                                        <span class="p-0 m-0 mt-1 float-right">
                                                            <a href="javascript: void(0);" onclick="edit_review('<?php echo $review['review_id'] ?>')">
                                                                <i class="icon-edit"></i>
                                                            </a>
                                                            <a href="javascript: void(0);" onclick="confirm_modal('user/review_modify/delete/'<?php //$review['review_id'].'/'.$slug.'/'.$listing_id?>');"
                                                                class="text-danger">
                                                                <i class="icon-trash pb-2"></i>
                                                            </a>
                                                        </span>
                                <?php 
                                    } 
                                ?>
                            </p>

                            <?php if($user_type == 2 && $user_id == $reviewer['id']){ ?>
                            <div class="row" id="<?php echo $review['review_id'] ?>" style="display: none;">
                                <div class="col-12">
                                    <form method="post" action="user/review_modify/edit/<?php //$review['review_id'].'/'.$slug.'/'.$listing_id?>">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Rating</label>
                                                <div class="custom-select-form">
                                                    <select name="review_rating" id="review_rating" class="wide">
                                                        <option value="1" <?php if(1==$review[ 'review_rating'])echo 'selected'; ?> >1</option>
                                                        <option value="2" <?php if(2==$review[ 'review_rating'])echo 'selected'; ?> >2</option>
                                                        <option value="3" <?php if(3==$review[ 'review_rating'])echo 'selected'; ?> >3</option>
                                                        <option value="4" <?php if(4==$review[ 'review_rating'])echo 'selected'; ?> >4</option>
                                                        <option value="5" <?php if(5==$review[ 'review_rating'])echo 'selected'; ?> >5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Your Review</label>
                                                <textarea name="review_comment" id="review_comment" class="form-control" rows="4">
                                                    <?php echo $review['review_comment']; ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group col-md-12 add_top_20 add_bottom_30">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="submit" value="Submit" class="btn_1 float-right" id="submit-review">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
            </div>
            <?php //endforeach; ?>
            <!-- Single Review Endss -->
        </div>
        <!-- /review-container -->
    </section>

    <?php 
  if($user_type == 2)
  { 
?>
    <hr>
    <!-- Leave a review starts -->
    <div class="add-review">
        <h5>Leave a review</h5>
        <form action="{{route('review')}}" method="post">
            {{csrf_field()}}
            <!-- <input type="hidden" name="slug" value="<?php //echo $slug; ?>"> -->
            <input type="hidden" name="listing_id" value="<?php echo $listing_detail['id']; ?>">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Rating</label>
                    <div class="custom-select-form">
                        <select name="review_rating" id="review_rating" class="wide">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Your review</label>
                    <textarea name="review_comment" id="review_comment" class="form-control" style="height:130px;"></textarea>
                </div>
                <div class="form-group col-md-12 add_top_20 add_bottom_30">
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" value="Submit" class="btn_1" id="submit-review">
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <?php $claiming_status=claiming_status($listing_detail['id']);//$claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing_detail['id']))->row('status'); ?>
                                    <?php if($claiming_status == 0): ?>
                                    <a href='javascript::' class="btn btn-warning float-right btn-sm" onclick="showClaimForm();">Claim this listing
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12">
                                    <small style="float: right;" class="mt-2">
                                        <a href='javascript::' @if(Auth::check()) onclick="showReportForm();" @else onclick="loginAlert()" @endif style="color: #616161;">Report this listing</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="" id="claim_form" style="display: none;">
        <h5>Claim this listing</h5>
        {!! Form::open(array('method'=>'POST','action'=>'ListingsController@claim')) !!} 
        {{csrf_field()}} 
        {!!Form::hidden('listing_id',$listing_detail['id'])!!}
        <div class="row">
            <div class="form-group col-md-12">
                {!!Form::label('full_name','Full name')!!} 
                {!!Form::text('full_name',null,['class'=>'form-control','id'=>'name'])!!}
            </div>
            <div class="form-group col-md-12">
                {!!Form::label('phone','Phone')!!} 
                {!!Form::text('phone',null,['class'=>'form-control','id'=>'phone'])!!}
            </div>
            <div class="form-group col-md-12">
                {!!Form::textarea('additional_information',null,['class'=>'form-control','rows'=>3,'placeholder'=>'Additional proof to expedite
                claim approval...'])!!}
            </div>
            <div class="form-group col-md-12 add_top_20 add_bottom_30">
                <div class="row">
                    <div class="col-6">
                        {!! Form::submit('submit claim request',['class'=>'btn_1','id'=>'submit-report']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="" id="report_form" style="display: none;">
        <h5>Report this listing</h5>
        <form action="{{route('report')}}" method="post">
        {{csrf_field()}} 
            <!-- <input type="hidden" name="slug" value="<?php //echo $slug; ?>"> -->
            <input type="hidden" name="listing_id" value="<?php echo $listing_detail['id']; ?>">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Report</label>
                    <textarea name="report" id="report" class="form-control" style="height:130px;"></textarea>
                </div>
                <div class="form-group col-md-12 add_top_20 add_bottom_30">
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" value="Submit Report" class="btn_1" id="submit-report">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
  }
  elseif($user_type == 1)
  {

  }   
 else
  {
?>
        <a href="/login" class="btn btn-warning float-right">Login to review</a>
        <?php 
  } 
?>


        <!-- Leave a review ends -->


        <script>
            function edit_review(review_id) {
                $("#" + review_id).slideToggle("slow");
            }
            // $(document).ready(function(){
            //   $("#edit_review_button").click(function(){
            //     $("#edit_review_form").slideToggle("slow");
            //   });
            // });

        </script>
