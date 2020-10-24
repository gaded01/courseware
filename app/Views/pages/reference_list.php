<?php $this->extend('layouts/main.php') ?>
<?php $this->section('content') ?>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb rounded-0">
    <li class="breadcrumb-item " aria-current="page">Topic</li>
    <li class="breadcrumb-item " aria-current="page">Subtopic</li>
    <li class="breadcrumb-item active" aria-current="page">Reference</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="border">
      <div class="card-header">
        Form | <span class="text-primary">Add Reference</span>
      </div>
      <div class="card-body">
        <form action="course/newCourse" method="post">
          <div class="form-group row">
            <div class="col-sm-12">
              <small class="form-text text-muted">Topic</small>
              <input type="text" class="form-control rounded-0" id="code" name="topic" placeholder="Enter new topic">
            </div>
          </div>
          <button class="btn btn-outline-primary btn-block mt-4">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-4">
        <small id="emailHelp" class="form-text text-muted">Topic:</small>
        <label for="exampleInputEmail1"></label>
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
        <tr>
          <td width="2%"></td>
          <td width="30%"><a href=""></a></td>
          <td width="40%"></td>
          <td class="text-center">
            <a href="course/remove/" class="btn btn-danger btn-sm rounded-circle"><span class="fas fa-trash"></span></a>
            <a href="" class="btn btn-success btn-sm rounded-circle"><span class="fas fa-pen"></span></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php $this->endSection()?>