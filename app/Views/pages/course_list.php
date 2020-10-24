<?php

$this->extend('layouts/main.php') ?>
<?php $this->section('content') ?>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb rounded-0 ">
    <li class="breadcrumb-item active" aria-current="page">Topic</li>
  </ol>
 
</nav>
<div class="row">
  <div class="col-md-4">
    <div class="border">
      <?php if(isset($get_course)) : ?>
      <?php foreach($get_course as $row) : ?>
      <div class="card-header">
        Form | <span class="text-secondary">Update</span>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url('course/newUpdate')?>" method="post">
          <div class="form-group row">
            <div class="col-sm-12">
              <small class="form-text text-muted">Topic</small>
              <input class="form-control" type="hidden" name="id" value="<?= $row->id ?>">
              <input type="text" class="form-control rounded-0" id="code" name="topic" placeholder="Enter code"
                value="<?= $row->topic ?>">
            </div>
          </div>
          <div class="from-group row">
            <div class="col-sm-12">
              <small class="form-text text-muted">Description</small>
              <input type="text" class="form-control rounded-0" id="name" name="description" placeholder="Enter course"
                value="<?= $row->description ?>">
            </div>
          </div>
          <button class="btn btn-success btn-block mt-4">Update</button>
        </form>
        <?php endforeach ?>
        <?php else : ?>
        <div class="card-header">
          Form | <span class="text-secondary">Insertion</span>
        </div>
        <div class="card-body">
          <form action="<?= base_url('course/newCourse') ?>" method="post">
            <div class="form-group row">
              <div class="col-sm-12">
                <small class="form-text text-muted">Topic</small>
                <input type="text" class="form-control rounded-0" id="code" name="topic" placeholder="Enter new topic">
                <small class="form-text text-danger">
                  <?php if(isset($error)) : ?>
                  <?= $error->getError('topic') ?>
                  <?php endif?>
                </small>
              </div>
            </div>
            <div class="from-group row">
              <div class="col-sm-12">
                <small class="form-text text-muted">Desctription</small>
                <input type="text" class="form-control rounded-0" id="name" name="description"
                  placeholder="Enter description">
                <small class="form-text text-danger">
                  <?php if(isset($error)) : ?>
                  <?= $error->getError('topic') ?>
                  <?php endif?>
                </small>
              </div>
            </div>
            <button class="btn btn-primary btn-block mt-4">Submit</button>
          </form>
          <?php endif ?>
        </div>
      </div>
      <?php if(isset($success)) : ?>
      <div class="alert alert-success text-center alert-msg" role="alert">
        <?= $success  ?>
      </div>
      <?php endif ?>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-4 d-flex text-secondary align-items-center">
          <h5>Topic List</h5>
        </div>
        <div class="col-md-8">
          <form action="<?= base_url('course/search')?>" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control rounded-0" name="course" id="course" placeholder="Search Here">
              <div class="input-group-append">
                <button class="btn btn-outline-primary rounded-0" type="submit">
                  <span class="fas fa-search"></span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <table class="table border-left border-right">
        <thead>
          <tr>
            <th class="text-center" scope="col">No.</th>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th class="text-center" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $num = 1 ?>
          <?php if(isset($result)) : ?>
          <?php foreach($result as $row) :  ?>
          <tr>
            <td width="2%"><?= $num++ ?></td>
            <td width="30%"><a href="<?= base_url('subtopic').'/'.$row->id?>"><?= $row->topic ?></a></td>
            <td width="40%"><?= $row->description ?></td>
            <td class="text-center">
              <a href="<?= base_url('course/remove/').'/'.$row->id ?>"
                class="btn btn-danger btn-sm rounded-circle"><span class="fas fa-trash"></span></a>
              <a href="<?= base_url('course/update/').'/'.$row->id?>"
                class="btn btn-success btn-sm rounded-circle"><span class="fas fa-pen"></span></a>
            </td>
          </tr>
          <?php endforeach ?>
          <?php else : ?>
          <?php foreach($course as $courselist) : ?>
          <tr>
            <td width="2%"><?= $num++ ?></td>
            <td width="30%"><a href="<?= base_url('subtopic').'/'.$courselist->id?>"><?= $courselist->topic ?></a></td>
            <td width="40%"><?= $courselist->description ?></td>
            <td class="text-center">
              <a href="<?= base_url('course/remove').'/'.$courselist->id ?>"
                class="btn btn-danger btn-sm rounded-circle"><span class="fas fa-trash"></span></a>
              <a href="<?= base_url('course/update').'/'.$courselist->id?>"
                class="btn btn-success btn-sm rounded-circle"><span class="fas fa-pen"></span></a>
            </td>
          </tr>
          <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
      <?php if(isset($count)) :?>
      <div class="alert alert-success text-center alert-msg" role="alert">
        <?= $count  ?> result found
      </div>
      <?php elseif(isset($removeMessage)) :?>
      <div class="alert alert-danger text-center alert-msg" role="alert">
        <?= $removeMessage  ?>
      </div>
      <?php elseif(isset($updateMessage)) :?>
      <div class="alert alert-success text-center alert-msg" role="alert">
        <?= $updateMessage  ?>
      </div>
      <?php endif ?>
    </div>
  </div>

  <script>
    setTimeout(() => { $('.alert-msg').hide()} , 10000);
  </script>
  <?php $this->endSection()?>