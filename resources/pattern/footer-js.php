<?php if(!isset($_SESSION['auth'])){?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="auth/logout.php">Keluar</a>
      </div>
    </div>
  </div>
</div>
<?php }?>

<!-- Bootstrap core JavaScript-->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>assets/js/demo/chart-pie-demo.js"></script>
<script>
    const messageSuccess = $('.message-success').data('message-success');
    const messageInfo = $('.message-info').data('message-info');
    const messageWarning = $('.message-warning').data('message-warning');
    const messageDanger = $('.message-danger').data('message-danger');

    if(messageSuccess){
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Terkirim',
            text: messageSuccess,
        })
    }

    if(messageInfo){
        Swal.fire({
            icon: 'info',
            title: 'For your information',
            text: messageInfo,
        })
    }
    if(messageWarning){
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!!',
            text: messageWarning,
        })
    }
    if(messageDanger){
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: messageDanger,
        })
    }
</script>