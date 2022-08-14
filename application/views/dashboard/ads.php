<?php $url =  $advs['caption'];
			$sid = $advs['sid']?> 		
<style type="text/css">
	.btn-sharp{
		border-radius: 0px;
	}
</style>
			<div class="right_col" role="main">
					<div class="page-title">
						<div class="title_left">
							<h3>Ads</h3>
						</div>
					</div>
					<div class="clearfix"></div>
          	<div class="clearfix">
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Ads Banner</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="img img-responsive pb-3">
										<img class="mx-auto d-block" src="<?php echo base_url('resources/img/ads/'.$sid.'.jpg') ?>" style="width: 100%;">
									</div>
								</div>
								<div class="x_content">
										<a href="<?php echo base_url('resources/img/avatar.jpg') ?>" download>
											<button type="button" class="btn btn-sharp btn-warning" style="display: block;margin: auto;">Download  <i class="fa fa-download"></i></button>
										</a>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Ads Banner Caption :-</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<!-- Target -->
									<div>
										<p id="copytoclip"><?php echo $advs['caption'];?> </p>
									</div>
								<!-- Trigger -->
								<div class="text-center">
									<button class="btn btn-primary btn-sharp" onclick="CopyToClipboard('copytoclip')">
									Copy Text <i class="fa fa-clipboard"></i>
									</button>
								</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="x_panel">
								<div class="x_title">
									<h2>Url Link :-</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<!-- Target -->
								<div id="foo">
									<p><?php echo $advs['caption'];?> </p>
								</div>


								<!-- Trigger -->
								<a class="btn btn-success btn-sharp pull-right" href="<?php echo 'https://api.whatsapp.com/send?text='.$url ?>" data-action="share/whatsapp/share" target="_blank">
									Share on <i class="fa fa-whatsapp"></i>
								</a>
								</div>
							</div>
						</div>
					</div><br>
					<div style="border-bottom: 1px dashed grey"></div>
			</div>
<script>
function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("Text has been copied, now paste in whatsapp status")
  }
}
</script>