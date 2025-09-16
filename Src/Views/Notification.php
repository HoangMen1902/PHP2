<?php

use Src\Notifications\Notification;

if(isset($_SESSION['error']) || isset($_SESSION['success'])):
?>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
       data-bs-autohide="true" data-bs-delay="5000">
    <div class="toast-header">
      <img src="<?=isset($_SESSION['success']) ? $_ENV['APP_URL'] . '/public\Assets\Imgs\green.jpg' : $_ENV['APP_URL'] . '/public\Assets\Imgs\red.jpg'?>" class="rounded me-2" alt="icon" style="max-width: 21px; max-height: 21px;">
      <strong class="me-auto"><?=isset($_SESSION['success']) ? $_SESSION['success']['name'] : $_SESSION['error']['name']?></strong>
      <small>Vài giây trước</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    <span class="text-dark"><?=isset($_SESSION['success']) ? $_SESSION['success']['message'] : $_SESSION['error']['message']?></span>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    var toastEl = document.getElementById('liveToast');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
  });
</script>

<?php
endif;
Notification::unset();
?>