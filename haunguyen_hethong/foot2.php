            </div>
        </div>
        <footer class=
        "content-mini content-mini-full font-s12 bg-gray-lighter clearfix" id=
        "page-footer">
            <div class="text-center">
                © <span class="js-year-copy"><?php echo date("Y"); ?></span>
             
            </div>
            <div class="text-center">
                Viết bởi <a class="font-w600" href="https://www.facebook.com/profile.php?id=100004684695399" target="_blank">Hậu Nguyễn</a>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="requestModal" role="dialog" tabindex="-1">
    </div>
	
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/jquery.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/bootstrap.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/jquery.slimscroll.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/bootstrap-notify/bootstrap-notify.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/bootstrap-show-password.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/slick/slick.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/jquery.appear.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/jquery.countTo.min.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/jquery.showHideItem.js">
    </script> 
    <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/core.js">
    </script> 
	 <script src="http://<?=$_SERVER['HTTP_HOST'].TPATH?>/assets/js/clipboard.js">
    </script> 

	 <script type="text/javascript">
    $(document).ready(function() {
      var req;
      $("#btn-buy").click(function() {
        var $btn = $(this);
        $btn.button('loading');
        if (req) {
          req.abort();
        }
        req = $.ajax({
          url: "http://<?=$_SERVER['HTTP_HOST'].TPATH?>/getacc/index.php",
          type: "POST",
          data: "id=<?=$get['id'];?>"
        });
        req.done(function(response, textStatus, jqXHR) {
          var json = $.parseJSON(response);
          console.log(json);
          if (json.err == 0) {
            App.notifyTopCenter('<strong>Ok!</strong> ' + json.msg, 'success', 'fa fa-times');
          } else {
            App.notifyTopCenter('<strong>Opps!</strong> ' + json.msg, 'danger', 'fa fa-times');
          }
          $btn.button('reset');
        });
        event.preventDefault();
      });
    });</script>

</body>
</html>