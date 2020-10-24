<?php $this->extend('layouts/main.php') ?>

<?php $this->section('content') ?>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb rounded-0">
    <li class="breadcrumb-item" aria-current="page">Topic</li>
    <li class="breadcrumb-item active" aria-current="page">Subtopic</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-4">
    <div class="border">
      <?php if(isset($subtopic2)) : ?>
      <?php foreach($subtopic2 as $data) : ?>
      <div class="card-header">
        Form | <span class="text-secondary">Update</span>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url('Subtopic/updateSubtopic').'/'.$data->id?>" method="post">
          <div class="form-group row">
            <div class="col-sm-12">
              <small class="form-text text-muted">Sub-topic</small>
              <input type="hidden" name="subtopic_id" value="<?= $data->subtopic_id?>">
              <input type="text" class="form-control rounded-0" id="code" name="sub_topic"
                placeholder="Enter new subtopic" value="<?= $data->sub_topic?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
        </form>
      </div>
    </div>
    <?php endforeach ?>
    <?php else : ?>
    <?php foreach($course as $topic) : ?>
    <div class="card-header">
      Form | <span class="text-secondary">Insertion</span>
    </div>
    <div class="card-body">
      <form action="<?php echo base_url('Subtopic/insertSubtopic').'/'.$topic->id?>" method="post">
        <div class="form-group row">
          <div class="col-sm-12">
            <small class="form-text text-muted">Sub-topic</small>
            <input class="form-control" type="hidden" name="id" value="<?= $topic->id ?>>">
            <input type="text" class="form-control rounded-0" id="code" name="subtopic"
              placeholder="Enter new subtopic">
            <small class="form-text text-danger">
              <?php if(isset($error)) : ?>
              <?= $error->getError('subtopic') ?>
              <?php endif?>
            </small>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
      </form>
    </div>
  </div>
  <?php endforeach ?>
  <?php endif ?>
  <?php if(isset($success)) : ?>
  <div class="alert alert-success text-center alert-msg" role="alert">
    <?= $success  ?>
  </div>
  <?php endif ?>
</div>
<div class="col-md-8">
  <div class="row">
    <div class="col-md-4">
      <div class="d-flex align-items-start">
        <?php if(isset($course)) : ?>
        <?php foreach($course as $topic) : ?>
        <small class="text-secondary" style="font-size:12px">Topic</small>
      </div>
      <h5 class="text-secondary"><?= $topic->topic ?></h5>
    </div>
    <div class="col-md-8">
      <form action="<?= base_url('subtopic/search').'/'. $topic->id?>" method="GET">
        <div class="input-group mb-3">
          <input type="text" class="form-control rounded-0" name="subtopic" id="course" placeholder="Search Here">
          <div class="input-group-append">
            <button class="btn btn-outline-primary rounded-0" type="submit">
              <span class="fas fa-search"></span>
            </button>
          </div>
        </div>
      </form>
    </div>
    <?php endforeach ?>
    <?php endif ?>
  </div>
  <table class="table border-left border-right">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Subtopic</th>
        <th class="text-center" scope="col">Content</th>
        <th class="text-center" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num = 1; ?>
      <?php if(isset($result)) : ?>
      <?php foreach($result as $row) : ?>
      <tr>
        <td><?= $num++ ?></td>
        <td><?= $row->sub_topic ?></td>
        <td class="text-center"><a href="<?= base_url('subtopic/content').'/'.$row->subtopic_id ?>"
            class="badge badge-info">View Content</a></td>
        <td class="text-center">
          <a href="<?= base_url('subtopic/remove').'/'.$row->course_id.'/'.$row->subtopic_id?>"
            class="btn btn-danger btn-sm rounded-circle"><span class="fas fa-trash"></span></a>
          <a href="<?= base_url('subtopic/edit').'/'.$row->course_id.'/'.$row->subtopic_id?>"
            class="btn btn-success btn-sm rounded-circle"><span class="fas fa-pen"></span></a>
        </td>
      </tr>
      <?php endforeach ?>
      <?php else : ?>
      <?php foreach($subtopic as $data) : ?>
      <tr>
        <td><?= $num++ ?></td>
        <td><?= $data->sub_topic ?></td>
        <td class="text-center"><a href="<?= base_url('subtopic/content').'/'.$data->subtopic_id ?>"
            class="badge badge-info">View Content</a></td>
        <td class="text-center">
          <a href="<?= base_url('subtopic/remove').'/'.$data->id.'/'.$data->subtopic_id?>"
            class="btn btn-danger btn-sm rounded-circle"><span class="fas fa-trash"></span></a>
          <a href="<?= base_url('subtopic/edit').'/'.$data->id.'/'.$data->subtopic_id?>"
            class="btn btn-success btn-sm rounded-circle"><span class="fas fa-pen"></span></a>
        </td>
      </tr>
      <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
  <?php if(isset($count)) : ?>
  <div class="alert alert-success text-center alert-msg" role="alert">
    <?= $count  ?> result found
  </div>
  <?php elseif(isset($update)) : ?>
  <div class="alert alert-success text-center alert-msg" role="alert">
    <?= $update  ?>
  </div>
  <?php elseif(isset($delete)) : ?>
  <div class="alert alert-danger text-center alert-msg" role="alert">
    <?= $delete  ?>
  </div>
  <?php endif ?>
</div>
<script>
setTimeout(() => {
  $('.alert-msg').hide()
}, 10000);
</script>
<?php $this->endSection()?>