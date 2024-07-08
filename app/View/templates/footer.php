<footer class="main-footer">
  <strong>Copyright &copy; 2024 <a href="https://www.instagram.com/andrrianhidayat">@andrrianhidayat</a>.</strong>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASEURL ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASEURL ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= BASEURL ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= BASEURL ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= BASEURL ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= BASEURL ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= BASEURL ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= BASEURL ?>/plugins/moment/moment.min.js"></script>
<script src="<?= BASEURL ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= BASEURL ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= BASEURL ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASEURL ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= BASEURL ?>/dist/js/pages/dashboard.js"></script>
<?php if (isset($model['script'])) {
  foreach ($model['script'] as $script) {
?>
    <script src="<?= BASEURL . $script ?>"></script>
<?php }
} ?>


</body>

</html>