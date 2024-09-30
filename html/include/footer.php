<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer-text">
                    <img src="images/logo-2.png" alt="" class="img-fluid icon">
                    <p class="para-1">Simply put: Gematriaverse  is the practice of coding numbers into words. It is an ancient practice that traces back to at least the Hebrew and Greek languages, in which they used letters from the alphabet as numbers. Check our What is gematria? and FAQ pages.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-text">
                    <ul class="anker">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="memberships.php">Memberships</a></li>
                        <li><a href="{{route('calculator')}}">Calculator</a></li>
                        <li><a href="date-calculator.php">Date Calculator</a></li>
                        <!-- <li><a href="blog.php">Blog</a></li> -->
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <!-- <li><a href="javascript:;">Policies</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-text">
                    <h3 class="heading-3">Media</h3>
                    <ul class="icon-img">
                        <li class="twiter"><a href="javascript:;"><img src="images/twiter.svg" alt="" class="img-fluid"></a></li>
                        <li class="youtube"><a href="javascript:;"><i class="fab fa-youtube"></i></a></li>
                        <li class="discord"><a href="javascript:;"><i class="fab fa-discord"></i></a></li>
                        <li class="square"><a href="javascript:;"><i class="fas fa-pen-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="para-1">© 2024 <a href="javascript:;">Gematriaverse </a>. <a href="javascript:;">Website development</a> powered by <a href="https://inoviodesigns.com/" target="_blank" >Inovio Designs</a>, Inc.</p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="from-group">

                        <div class="row">
                            <div class="label-from">
                                <label for="">Username or Email Address</label>
                            </div>
                            <div class="col-12 p-0">
                                <input type="text" class="form-control" placeholder="First">

                            </div>
                            <div class="label-from">
                                <label for="">Password</label>
                            </div>
                            <div class="col-12 p-0">
                                <input type="text" class="form-control" placeholder="Last">

                            </div>
                        </div>
                    </div>

                    <div class="from-group">
                        <button type="submit" class="btn custom-btn">Log in</button>
                        <a href="#">Lost your password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- particles js  -->
<script src="https://npmcdn.com/particlesjs@1.0.2/dist/particles.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="js/custom.js"></script>

<!-- counter -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
 function counter(id, start, end, duration) {
  let obj = document.getElementById(id),
   current = start,
   range = end - start,
   increment = end > start ? 1 : -1,
   step = Math.abs(Math.floor(duration / range)),
   timer = setInterval(() => {
    current += increment;
    obj.textContent = current;
    if (current == end) {
     clearInterval(timer);
    }
   }, step);
 }
 counter("count1", 0, 1420137, 10);
 counter("count2", 0, 2400, 10);
 counter("count3", 0, 5500, 10);
  counter("count4", 0, 20, 1000);
});

</script>

</body>

</html>