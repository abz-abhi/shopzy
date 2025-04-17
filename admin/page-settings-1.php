<?php
include("session.php");
include('common/header.php') ?>
<section class="content-main">
  <div class="content-header">
    <h2 class="content-title">Profile setting</h2>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row gx-5">
        <aside class="col-lg-3 border-end">
          <nav class="nav nav-pills flex-lg-column mb-4">
            <a class="nav-link active" aria-current="page" href="#">General</a><a class="nav-link" href="#">Moderators</a><a class="nav-link" href="#">Admin account</a><a class="nav-link" href="#">SEO settings</a><a class="nav-link" href="#">Mail settings</a><a class="nav-link" href="#">Newsletter</a>
          </nav>
        </aside>
        <div class="col-lg-9">
          <section class="content-body p-xl-4">
            <form>
              <div class="row">
                <div class="col-lg-8">
                  <div class="row gx-3">
                    <div class="col-6 mb-3">
                      <label class="form-label">First name</label>
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Type here" />
                    </div>
                    <!-- col .//-->
                    <div class="col-6 mb-3">
                      <label class="form-label">Last name</label>
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Type here" />
                    </div>
                    <!-- col .//-->
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Email</label>
                      <input
                        class="form-control"
                        type="email"
                        placeholder="example@mail.com" />
                    </div>
                    <!-- col .//-->
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Phone</label>
                      <input
                        class="form-control"
                        type="tel"
                        placeholder="+1234567890" />
                    </div>
                    <!-- col .//-->
                    <div class="col-lg-12 mb-3">
                      <label class="form-label">Address</label>
                      <input
                        class="form-control"
                        type="text"
                        placeholder="Type here" />
                    </div>
                    <!-- col .//-->
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Birthday</label>
                      <input class="form-control" type="date" />
                    </div>
                    <!-- col .//-->
                    <!-- row.//-->
                    <!-- col.//-->
                  </div>
                </div>
                <aside class="col-lg-4">
                  <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
                    <figure class="text-lg-center">
                      <img
                        id="previewImage"
                        class="img-lg mb-3 img-avatar"
                        src="assets/imgs/people/avatar1.png"
                        alt="User Photo" />

                      <figcaption>
                        <input type="file" name="avatar" id="avatar" style="display: none;" accept="image/*">
                        <label for="avatar" class="btn btn-light rounded font-md" style="cursor: pointer;">
                          <i class="icons material-icons md-backup font-md"></i> Upload
                        </label>
                      </figcaption>
                    </figure>
                  </form>
                </aside>

                <script>
                  const input = document.getElementById('avatar');
                  const preview = document.getElementById('previewImage');

                  input.addEventListener('change', function() {
                    const file = this.files[0];

                    if (file) {
                      const reader = new FileReader();

                      reader.onload = function(e) {
                        preview.src = e.target.result; // update image preview
                      }

                      reader.readAsDataURL(file);
                    }
                  });
                </script>
              </div>
              <br />
              <button class="btn btn-primary" type="submit">
                Save changes
              </button>
            </form>
            <hr class="my-5" />
            <div class="row" style="max-width: 920px">
              <div class="col-md">
                <article class="box mb-3 bg-light">
                  <a
                    class="btn float-end btn-light btn-sm rounded font-md"
                    href="#">Change</a>
                  <h6>Password</h6>
                  <small class="text-muted d-block" style="width: 70%">You can reset or change your password by clicking
                    here</small>
                </article>
              </div>
              <!-- col.//-->
              <div class="col-md">
                <article class="box mb-3 bg-light">
                  <a
                    class="btn float-end btn-light rounded btn-sm font-md"
                    href="#">Deactivate</a>
                  <h6>Remove account</h6>
                  <small class="text-muted d-block" style="width: 70%">Once you delete your account, there is no going
                    back.</small>
                </article>
              </div>
              <!-- col.//-->
              <!-- row.//-->
              <!-- content-body .//-->
              <!-- col.//-->
              <!-- row.//-->
              <!-- card body end//-->
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="main-footer font-xs">
  <div class="row pb-30 pt-15">
    <div class="col-sm-6">
      <script>
        document.write(new Date().getFullYear());
      </script>
      &copy;, Ecom - HTML Ecommerce Template .
    </div>
    <div class="col-sm-6">
      <div class="text-sm-end">All rights reserved</div>
    </div>
  </div>
</footer>
</main>
<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendors/select2.min.js"></script>
<script src="assets/js/vendors/perfect-scrollbar.js"></script>
<script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="assets/js/vendors/chart.js"></script>
<script src="assets/js/main.js?v=1.0.0"></script>
<script src="assets/js/custom-chart.js" type="text/javascript"></script>
</body>

</html>