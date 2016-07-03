   </div>   
   
	 <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrapValidator.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
	<!-- image cropping js-->
	<script src="<?php echo base_url('assets/js/jquery.imgareaselect.js')?>" ></script>
	<script src="<?php echo base_url('assets/js/jquery.form.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/custome.js')?>"></script>
	
 
	<script>
		$('.carousel').carousel({
			interval: false
		  }); 
   
	$('.carousel-control.left').click(function() {
		if(1===parseInt($('.carousel-inner .active').attr('id'))){
						
				$('.content').hide();
				$('.content[data-id=' + ($(".slideCount").length) + ']').show();
						
			}
		else{
				$('.content').hide();
				$('.content[data-id=' + (parseInt($('.carousel-inner .active').attr('id'))-1) + ']').show();
			}
		 });

		$('.carousel-control.right').click(function() {
			if($(".slideCount").length===parseInt($('.carousel-inner .active').attr('id'))){
					$('.content').hide();
					$('.content[data-id=' + (1) + ']').show();
						
			   }
			else{
					$('.content').hide();
					$('.content[data-id=' + (parseInt($('.carousel-inner .active').attr('id'))+1) + ']').show();
				}
		});

/*Add first look Image Url */
$( ".addFirstlookImageUrl" ).click(function()  {
   var formData = new FormData();
   formData.append('firstlookImageUrl', $('input[type=file]')[0].files[0]); 
   formData.append('movieId',$(this).closest(".videoInfo" ).data("moive-id"));
   var divObject=$(this);
   $.ajax({
	  type: 'POST',
	  url: 'saveFirstlookDetails',
	  contentType: false,
      processData: false,
	  data: formData,
	  contentType: 'multipart/form-data',
	  success: function(result){
		  var youtubeCode = result.split("v=");
		  divObject.closest(".videoInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-firstlook-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100%;"></img><input class="delete deleteFirstlookVideoUrl" type="button" value="delete" /></div></div>');  
        
    }});
});
/*Add first look video Url */
$( ".addFirstlookVideoUrl" ).click(function() {
	var divObject=$(this);
  $.ajax({
	  type: 'POST',
	  url: 'saveFirstlookDetails',
	  data: {movieId:$(this).closest(".videoInfo" ).data("moive-id"),firstlookVideoUrl:$(this).closest(".videoInfo").find('.videoUrl').val()},
	  success: function(result){
		  var youtubeCode = result.split("v=");
		  divObject.closest(".videoInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-firstlook-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100%;"></img><input class="delete deleteFirstlookVideoUrl" type="button" value="delete" /></div></div>');  
        
    }});
});

/*Delete First Look video Url */
$(document).on("click",".deleteFirstlookVideoUrl", function() {
//$(".deleteFirstlookVideoUrl").click(function(){
	var divObject=$(this);
	$.ajax({
	  type: 'POST',
	  url: 'deleteFirstlookDetails',
	  data: {image_id:$(this).closest(".show-image").data("firstlook-detail-id")},
	  success: function(result){
		   divObject.closest(".show-image").remove();
    }});
	});

/*Add  trailer video Url */
$( ".addTrailerVideoUrl" ).click(function() {
	var divObject=$(this);
  $.ajax({
	  type: 'POST',
	  url: 'saveTrailerDetails',
	  data: {movieId:$(this).closest(".trailerInfo" ).data("moive-id"),trailerVideoUrl:$(this).closest(".trailerInfo").find('.videoUrl').val()},
	  success: function(result){
		   var youtubeCode = result.split("v=");
		  divObject.closest(".trailerInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-trailer-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100%;"></img><input class="delete deleteTrailerVideoUrl" type="button" value="delete" /></div></div>');  
    }});	
	});

/*Delete Trailer video Url */
$(document).on("click",".deleteTrailerVideoUrl", function() {
//$(".deleteTrailerVideoUrl").click(function(){
	var divObject=$(this);
	$.ajax({
	  type: 'POST',
	  url: 'deleteTrailerDetails',
	  data: {trailer_id:$(this).closest(".show-image").data("trailer-detail-id")},
	  success: function(result){
		   divObject.closest(".show-image").remove();
    }});
	});
	
/*Add  music video Url */
$( ".addMusicVideoUrl" ).click(function(){
	var divObject=$(this);
  $.ajax({
	  type: 'POST',
	  url: 'saveMusicDetails',
	  data: {movieId:$(this).closest(".musicInfo" ).data("moive-id"),musicVideoUrl:$(this).closest(".musicInfo").find('.videoUrl').val()},
	  success: function(result){
		   var youtubeCode = result.split("v=");
		  divObject.closest(".musicInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-music-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100%;"></img><input class="delete deleteMusicVideoUrl" type="button" value="delete" /></div></div>');  
    }});
	});

/*Delete Music video Url */
$(document).on("click",".deleteMusicVideoUrl", function() {
//$(".deleteMusicVideoUrl").click(function(){
	var divObject=$(this);
	$.ajax({
	  type: 'POST',
	  url: 'deleteMusicDetails',
	  data: {music_id:$(this).closest(".show-image").data("music-detail-id")},
	  success: function(result){
		   divObject.closest(".show-image").remove();
    }});
	});
	
/*Add Assorted video Url */
$( ".addAssortedVideoUrl" ).click(function(){
	var divObject=$(this);
  $.ajax({
	  type: 'POST',
	  url: 'saveAssortedDetails',
	  data: {movieId:$(this).closest(".assortedInfo" ).data("moive-id"),assortedVideoUrl:$(this).closest(".assortedInfo").find('.videoUrl').val()},
	  success: function(result){
		  var youtubeCode = result.split("v=");
		  divObject.closest(".assortedInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-assorted-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100;"></img><input class="delete deleteAssortedVideoUrl" type="button" value="delete" /></div></div>');  
    }});
	});
	
/*Delete Assorted video Url */
$(document).on("click",".deleteAssortedVideoUrl", function() {
//$(".deleteAssortedVideoUrl").click(function(){
	var divObject=$(this);
	$.ajax({
	  type: 'POST',
	  url: 'deleteAssortedDetails',
	  data: {assorted_id:$(this).closest(".show-image").data("assorted-detail-id")},
	  success: function(result){
		   divObject.closest(".show-image").remove();
    }});
	});
/*Add Downloaded video Url */
$( ".addDownloadVideoUrl" ).click(function(){
	var divObject=$(this);
  $.ajax({
	  type: 'POST',
	  url: 'saveDownloadDetails',
	  data: {movieId:$(this).closest(".downloadInfo" ).data("moive-id"),downloadVideoUrl:$(this).closest(".downloadInfo").find('.videoUrl').val()},
	  success: function(result){
		  var youtubeCode = result.split("v=");
		  divObject.closest(".downloadInfo" ).find(".savedVideoUrls").prepend('<div class="col-md-3 show-image" data-download-detail-id="'+youtubeCode[2]+'"><div style="height:200px;margin-top:10px;border:2px solid black;"><img src="http://img.youtube.com/vi/'+youtubeCode[1]+'/default.jpg" slide="slide_1" style="width: 100%;height:100%;"></img><input class="delete deleteDownloadVideoUrl" type="button" value="delete" /></div></div>');  
    }});
	});
	

/*Delete Downloaded video Url */
 $(document).on("click",".deleteDownloadVideoUrl", function() {
//$(".deleteDownloadVideoUrl").click(function(){
	var divObject=$(this);
	$.ajax({
	  type: 'POST',
	  url: 'deleteDownloadDetails',
	  data: {download_id:$(this).closest(".show-image").data("download-detail-id")},
	  success: function(result){
		   divObject.closest(".show-image").remove();
    }});
	});
	
</script>
  </body>
</html>
