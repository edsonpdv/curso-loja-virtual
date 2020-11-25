
<?php $this->load->view('restrita/layout/navbar'); ?>
<?php $this->load->view('restrita/layout/sidebar'); ?>
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

            <?php if($message = $this->session->flashdata('sucesso')): ?>
              <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="fas fa-check-circle"></i></div>

                <div class="alert-body">
                  <div class="alert-title"> Muito bem!</div>
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <?php echo $message; ?>
                </div>
              </div>
            <?php endif;?>

          </div>
        </section>
        
      </div>
      