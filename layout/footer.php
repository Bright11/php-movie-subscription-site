<div class="container-fluid">
<div id="footer" >
<div class="col-md-12 " >


<div class="row">
<div class="col-md-4">
<p class="colume"><a href="index.php">HOME</a></p>
<p class="colume"><a href="pictures">Gallery</a></p>
<p class="colume"><a href="register"><i class="fas fa-lock"></i>&nbsp;&nbsp;Register</a></p>
<p class="colume"><a href="sigin"><i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;Login</a></p>
</div>
<div class="col-md-4">
<h4 class="colume">About us</h4>
<p class="colume"><a href="about">About us</a></p>
<p class="colume"><a href="#"><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;Location</a></p>
<p class="colume"><a href="latestnews">Latest News</a></p>
<p class="colume"><a href="contactus"><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;Contact Us</a></p>
</div>
<div class="col-md-4">
<h4 class="colume">Join us on social media</h4>
<p class="colume"><a href="https://m.facebook.com/pg/Jaxinn-films-production-107212117391691/"target="_blank"><i class="fab fa-facebook"></i>&nbsp;&nbsp;Facebook</a></p>
<p class="colume"><a href="https://www.instagram.com/p/B5kl7btpALQ/?igshid=1ar3jndhq3imt"target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;Instagram</a></p>
<p class="colume"><a href="https://twitter.com/israelnathanie6?s=08"target="_blank"><i class="fab fa-twitter"></i>&nbsp;&nbsp;Twitter</a></p>
<p class="colume"><a href="#"><i class="fab fa-youtube"></i>&nbsp;&nbsp;YouTube</a></p>
</div>
</div>
<div class="copy_right">
<p style="font-size: 20px; letter-spacing: 2px; font-weight: 20px;">Copyrght &copy; Jaxinn Film Production&nbsp;&nbsp;<?php echo date("Y");?></p>
</div>
</div>


</div>
</div>


<script src="css/owlcarousel/owlplay.js"></script>
<script src="css/owlcarousel/owl_start.js"></script>

 <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
    $(document).ready(function(){
    $('#myform').on('submit', function(){

      $.ajax({
        type:"POST",
        url:"functions/comment.php",
        data:$(this).serialize(),
        success:function(response){
          if(jQuery.trim(response) == 'ok'){
      toastr.success('Successfully inserted record','success',{timeOut:2000});
   $('#myform').trigger('reset');
   getdata();
          }else{
             toastr.error('There is some error','Error',{timeOut:2000});
          }
        },
        error:function(){
          toastr.error('There is an error','Error',{timeOut:2000});
        }
      });
      function getdata(){
      $.ajax({
        url:'functions/getcomment.php',
        success:function(response){
          $('#getdata').html(response);
        },
        error:function(){
          toastr.error('There is an error','Error',{timeOut:2000});
        }


      });
      }
     return false;
    });
    });


    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Start of Tawk.to Script  To install tawk.to, you can place this code before the </body> tag on every page of your website.-->
<script type="text/javascript">
 

</body>
</html>
