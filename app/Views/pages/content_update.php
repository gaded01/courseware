<?php $this->extend('layouts/main.php') ?>
<?php $this->section('content') ?>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb rounded-0">
    <li class="breadcrumb-item " aria-current="page">Topic</li>
    <li class="breadcrumb-item " aria-current="page">Subtopic</li>
    <li class="breadcrumb-item active" aria-current="page">Content</li>
  </ol>
</nav>
<?php foreach($subtopic as $result) : ?>
<div class="row">
  <div class="col-md-8">
    <div class="d-flex justify-content-between border-info mt-2 pb-2">
      <div class="d-flex align-items-center">
        <h6 for=""><?= $result->sub_topic ?>|
          <span class="text-info" id="title-text">
            Update Content
          </span>
        </h6>
      </div>
      <a href="<?= base_url('subtopic/content/').'/'.$result->subtopic_id ?>" class="btn btn-default float-right"
        id="content-btn" style="border-radius:20px; box-shadow:none; background:none;" type="button">
        <span class="fas fa-times text-secondary" id="content-icn">
        </span>
      </a>
      <button class="btn btn-default float-right" id="reference-btn"
        style="border-radius:20px; box-shadow:none; background:none; display:none" type="button">
        <span class="fas fa-plus text-secondary" id="plus-icn" style="pointer-events: none;">
        </span>
      </button>
    </div>
    <div class="card border-0 update-content">
      <form action="<?= base_url('subtopic/contentUpdate').'/'. $result->subtopic_id ?>" method="post">
        <div class="card-body border-top border-bottom border-info">
          <textarea class="form-control border-0 content-textarea" name="content"
            autofocus><?=$result->content ?></textarea>
          <input type="submit" id="save-content" style="display:none" />
        </div>
      </form>
      <?php if(isset($successReference)) : ?>
      <div class="alert alert-success text-center mt-3 mb-0" role="alert" style="font-size: 12px">
        <span class="fas fa-check"></span>
        <?= $successReference ?>
      </div>
      <?php elseif(isset($deleteReference)) : ?>
      <div class="alert alert-danger text-center mt-3 mb-0" role="alert" style="font-size: 12px">
        <span class="far fa-trash-alt"></span>
        <?= $deleteReference ?>
      </div>
      <?php elseif(isset($updateReference)) : ?>
      <div class="alert alert-success text-center mt-3 mb-0" role="alert" style="font-size: 12px">
        <span class="fas fa-check"></span>
        <?= $updateReference ?>
      </div>
      <?php elseif(isset($errorReference)) : ?>
      <div class="alert alert-danger text-center mt-3 mb-0" role="alert" style="font-size: 12px">
        <span class="fas fa-exclamation-triangle"></span>
        <?= $errorReference->getError(); ?>
      </div>
      <?php endif ?>
      <div class="d-flex justify-content-start border-bottom border-info mt-5">
        <div class="d-flex align-items-center">
          <button class="btn btn-info btn-sm mr-2 mb-2 " id="reference-btn2" style="border-radius:20px; font-size: 13px"
            type="button">
            <span class="fas fa-plus " id="plus-icn" style="pointer-events: none;"></span>
          </button>
          <h6>Reference List</h6>
        </div>
      </div>
      <?php foreach($reference as $list)  :  ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center pr-0 ">
          <?= $list->reference?>
          <div class="d-flex justify-content-end">
            <a href="<?= base_url('subtopic/deleteReference').'/'. $list->reference_id.'/'. $list->subtopic_id ?>"
              class="btn btn-default float-right" style="border-radius:20px; box-shadow:none; background:none;"
              type="button">
              <span class="fas fa-trash text-secondary"></span>
            </a>
            <a href="<?= base_url('subtopic/editReference').'/'. $list->reference_id.'/'. $list->subtopic_id ?>"
              class="btn btn-default float-right update-link"
              style="border-radius:20px; box-shadow:none; background:none;" type="button">
              <span class="fas fa-edit text-secondary"></span>
            </a>
          </div>
        </li>
      </ul>
      <?php endforeach ?>
    </div>
    <div class="card border-0 update-reference" style="display:none">
      <?php if(isset($editReference)) : ?>
      <?php foreach($editReference as $list) : ?>
      <form action="<?= base_url('subtopic/updateReference').'/'. $list->reference_id .'/'. $list->subtopic_id ?>"
        method="post">
        <div class="card-body border-top border-bottom border-info">
          <textarea class="form-control border-0 " id="reference-textarea"
            name="reference"><?= $list->reference ?></textarea>
        </div>
        <div class="d-flex justify-content-start mt-1">
          <button class="btn btn-info submit-ref" style="font-size: 14px" type="submit">
            Save Reference
          </button>
        </div>
      </form>
      <?php endforeach ?>
      <?php else : ?>
      <form action="<?= base_url('subtopic/insertReference').'/'.$result->subtopic_id?>" method="post">
        <div class="card-body border-top border-bottom border-info">
          <input type="hidden" class="form-control" name="subtopic_id" value="<?= $result->subtopic_id?>">
          <textarea class="form-control border-0 " id="reference-textarea" name="reference"
            placeholder="Insert new reference here.."></textarea>
        </div>
        <div class="d-flex justify-content-start mt-1">
          <button class="btn btn-info pl-3 pr-3 submit-ref" style="font-size: 14px" type="submit">
            Save Reference
          </button>
        </div>
      </form>
      <?php endif ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="d-flex justify-content-end mb-2">
      <label class="btn btn-dark btn-block pt-2 pb-2 pl-4 pr-4" id="save-btn" type="submit" for="save-content"
        tabindex="0" style="font-size: 14px;">
        Save Content
      </label>
    </div>
    <div class="card rounded-0" style="min-height:300px">
      <div class="card-header border-bottom p-2">
        <h6 class="m-0 p-0">Resources</h6>
        <small class="form-text text-secondary m-0 p-0">Upload resources here</small>
      </div>
      <div class="card-body" style="min-height:200px">
        <?php if(isset($resources)) : ?>
        <?php foreach($resources as $resource) : ?>
        <div class="card mb-1 p-2">
          <div class="media">
            <img src="<?= base_url('/images').'/'.$resource->image?>" class="align-self-center mr-3" width="35px">
            <div class="media-body" style="overflow-x: hidden; white-space: nowrap;">
              <a class="card-link" download="<?= $resource->file ?>"
                href="<?= base_url().'../uploads/'.$resource->file ?>">
                <p class="m-0">
                  <?= $resource->title ?>
                </p>
              </a>
              <small class="m-0 text-secondary">
                Created at: <?= $resource->created_at ?>
              </small>
            </div>
            <a href="<?= base_url('resources/removeResource').'/'. $resource->resource_id.'/'. $resource->subtopic_id?>"
              class="btn btn-secondary btn-sm mt-2" id="reference-btn" style="border-radius:20px;" type="button">
              <span class="fas fa-trash text-light" id="plus-icn" style="pointer-events: none;">
              </span>
            </a>
          </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>
      </div>
      <div class="card-footer">
        <form action="<?= base_url('resources/upload').'/'.$result->subtopic_id ?>" method="post"
          enctype="multipart/form-data">
          <input type="file" name="resource[]" class="form-control-file" multiple>
          <button class="btn btn-secondary btn-block mt-2">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

<script>
$(document).ready(function() {
  $page = $('.update-reference');
  $('#reference-btn2').click(function() {
    location.reload('true');
    sessionStorage.setItem('display', 'insert-reference');
  });
  $('.update-link').click(function() {
    location.reload('true');
    sessionStorage.setItem('display', 'update-reference');
  });
  var block = sessionStorage.getItem('display');
  if (block == 'insert-reference') {
    $('.update-content').hide();
    $('#title-text').html(' Insert Reference').attr('class', 'text-info', );
    $('#plus-icn').attr('class', 'fas fa-times text-secondary');
    $('#reference-btn').attr('class', 'btn btn-default float-right insert-btn');
    $('#content-btn').hide();
    $('#save-btn').hide();
    $('#reference-btn').show();
    $('.update-reference').show();
    TextArea();
  } else if (block == 'update-reference') {
    $('.update-content').hide();
    $('#title-text').html(' Update Reference').attr('class', 'text-info', );
    $('#plus-icn').attr('class', 'fas fa-times text-secondary');
    $('#reference-btn').attr('class', 'btn btn-default float-right update-btn');
    $('#content-btn').hide();
    $('#save-btn').hide();
    $('#reference-btn').show();
    $('.update-reference').show();
    TextArea();
  }
  $('.insert-btn').click(function() {
    sessionStorage.clear();
    location.reload('true');
  })
  $('.update-btn').click(function() {
    sessionStorage.clear();
    window.history.back();
  })
  $('.submit-ref').click(function() {
    sessionStorage.clear();
  })
});

document.addEventListener('load', TextArea());

function TextArea() {
  const tx = document.getElementsByTagName('textarea');
  for (let i = 0; i < tx.length; i++) {
    tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
    tx[i].addEventListener("input", OnInput, false);
  }

  function OnInput() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  }
}
</script>
<?php $this->endSection()?>