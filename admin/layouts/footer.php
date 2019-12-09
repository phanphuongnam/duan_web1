 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
        
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function(){
        $('#fileUPLOAD').change(function(e){
            var fileName = e.target.files[0].name;
            $('#show_msg').html(fileName)
        });
    });

</script>
<script type="text/javascript">
   $(document).ready(function(){
        $('#fileUPLOAD2').change(function(e){
            var fileName = e.target.files[0].name;
            $('.show_msg').html(fileName)
        });
    });
</script>
<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('mota')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('motangan')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<!-- Morris.js charts -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo Base_url ?>admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo Base_url ?>admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo Base_url ?>admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo Base_url ?>admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo Base_url ?>admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo Base_url ?>admin/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo Base_url ?>admin/AdminLTE/dist/js/demo.js"></script>