<div class="col-md">
    <div class="card">
        <h5 class="card-header">Listing fomrat on home screen</h5>
        <div class="card-body">
            <?php
             if ($this->session->userdata("addFeatureMsg")!="") { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $this->session->userdata("addFeatureMsg"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php  }elseif($this->session->userdata("addFeatureErrorMsg")!=""){
                ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $this->session->userdata("addFeatureErrorMsg"); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php  }
            ?>
            <form class="needs-validation" method="POST" novalidate>
                <div class="row">
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="bs-validation-name">A to Z</label>
                    <input type="radio" class=""
                        value="1" <?php echo ($feature['format']==1)?"checked":""; ?> name="format"
                        id="bs-validation-name" placeholder="any car feature" required />
                    <div class="valid-feedback"></div>
                    <span><?php echo form_error("featureName"); ?></span>
                </div>
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="bs-validation-name">Z to A</label>
                    <input type="radio" class=""
                        value="2" <?php echo ($feature['format']==2)?"checked":""; ?> name="format"
                        id="bs-validation-name" placeholder="any car feature" required />
                    <div class="valid-feedback"></div>
                    <span><?php echo form_error("featureName"); ?></span>
                </div>
                <div class="mb-3 col-lg-4">
                    <label class="form-label" for="bs-validation-name">Random</label>
                    <input type="radio" class=""
                        value="3" <?php echo ($feature['format']==3)?"checked":""; ?> name="format"
                        id="bs-validation-name" placeholder="any car feature" required />
                    <div class="valid-feedback"></div>
                    <span><?php echo form_error("featureName"); ?></span>
                </div>
                </div>
             
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>