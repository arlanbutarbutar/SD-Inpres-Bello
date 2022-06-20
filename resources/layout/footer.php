<?php if (!isset($_SESSION['auth'])) { ?>
  <footer class="app-footer">
    <div class="container text-center py-3">
      <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
      <small class="copyright">Created with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="https://arcode.pw" target="_blank">Arlan Butar Butar</a></small>

    </div>
  </footer>
  <!--//app-footer-->

  <?php } else if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] == 1) { ?>
    <footer class="app-auth-footer">
      <div class="container text-center py-3">
        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
        <small class="copyright">Created with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="https://arcode.pw" target="_blank">Arlan Butar Butar</a></small>

      </div>
    </footer>
    <!--//app-auth-footer-->
    </div>
    <!--//flex-column-->
    </div>

    </div>
    <!--//row-->
<?php }
} ?>