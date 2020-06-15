
<?php  foreach ($result_gallery as $row)   { ?>
  <div class="col-md-6 col-lg-4">
                    <div class="card border-0 ">
                        <a class="lightbox" href="<?php echo $row['img_url']; ?>">
                            <img src="<?php echo $row['img_url']; ?>" alt="Card Image" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h6><a href="<?php echo $row['img_url']; ?>"><?php echo $row['img_title']; ?></a></h6>
                        </div>
                    </div>
                </div>
<?php } ?>

<?php if($result_gallery_count > 6){ ?>
<div class="col-md-12 col-lg-12 user-form text-center">
    <button type="button" class="btn btn-primary" onclick="LoadMorePicture('<?php echo $nos; ?>',this)"> View More...</button>
</div>    
<?php } ?>

 <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>