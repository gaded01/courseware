<?php $this->extend('layouts/main.php') ?>
<?php $this->section('content') ?>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb rounded-0">
    <li class="breadcrumb-item " aria-current="page">Topic</li>
    <li class="breadcrumb-item " aria-current="page">Subtopic</li>
    <li class="breadcrumb-item active" aria-current="page">Content</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-8 ">
    <div class="d-flex justify-content-between border-info mt-2 pb-2">
      <?php if(isset($subtopic)) : ?>
      <?php foreach($subtopic as $result) : ?>
      <div class="d-flex align-items-center">
        <h6 for=""><?= $result->sub_topic ?></h6>
      </div>
      <?php if(isset($updateContentMessage)) : ?>
      <small class="text-success" id="success-msg"><?= $updateContentMessage ?></small>
      <?php endif ?>
      <div class="dropdown dropleft">
        <button class="btn btn-default float-right" style="border-radius:20px; box-shadow:none" type="button"
          id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="fas fa-ellipsis-v"></span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?= base_url('subtopic/contentEditPage').'/'. $result->subtopic_id ?>">Update
            Content</a>
          <a class="dropdown-item" id="reference-link" href="#">References</a>
        </div>
      </div>
    </div>
    <div class="card border-0 mt-0 mb-4">
      <div class="card-body border-top border-bottom border-info">
        <?php if(strlen($result->content) == 0) : ?>
        <p class="text-secondary text-center" style="opacity: 50%;">No content available</p>
        <?php endif ?>
        <p style="white-space: pre-wrap;"><?= $result->content ?></p>
      </div>
      <div class="footer">
      </div>
    </div>
    <div class="card border-0" id="reference-view" style="display: none;">
      <div class="d-flex justify-content-between">
        <h6>List of Reference</h6>
        <button class="btn btn-default float-right" id="min-ref"
          style="border-radius:20px; background:none; box-shadow:none" type="button">
          <span class="fas fa-minus"></span>
        </button>
      </div>
      <ul>
        <?php foreach($reference as $ref) : ?>
        <li><?=$ref->reference ?></li>
        <?php endforeach?>
      </ul>
      <?php if(empty($reference)) :?>
      <div class="d-flex align-items-center justify-content-center">
        <p class="text-secondary" style="opacity:50%;">
          Empty reference list
        </p>
      </div>
      <?php endif ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card rounded-0">
      <div class="card-header p-2">
        <h6 class="m-0 p-0">Resources</h6>
        <small class="form-text text-secondary m-0 p-0">Click to download resources</small>
      </div>
      <div class="card-body" style="min-height:200px;">
        <?php if(!empty($resources)) : ?>
        <?php foreach($resources as $resource) : ?>
        <div class="card mb-1 p-2">
          <div class="media" style="overflow-x: hidden;">
            <img src="<?= base_url('/images').'/'.$resource->image?>" class="align-self-center mr-3" alt="..."
              width="35px">
            <div class="media-body" style="white-space: nowrap;">
              <a class="card-link" download="<?= $resource->file ?>"
                href="<?= base_url().'../uploads/'.$resource->file ?>">
                <p class="m-0">
                  <?= $resource->title ?>
                </p>
              </a>
              <small class="m-0 text-secondary"><b></b><?= $resource->file_type ?></small>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      <?php else : ?>
      <div class="d-flex align-items-center justify-content-center" style="min-height:150px;">
        <span class="text-secondary" style="opacity:50%">No file available</span>
      </div>
      <?php endif ?>
    </div>

  </div>
</div>
</div>
<?php endforeach ?>
<?php endif ?>
<script>
setTimeout(function() {
  $('#success-msg').hide();
}, 5000);

$(document).ready(function() {
  $ref = $('#reference-link');
  $min = $('#min-ref');
  $ref.click(function() {
    $('#reference-view').show();
  })
  $min.click(function() {
    $('#reference-view').hide();
  })

})
</script>
<?php $this->endSection()?>