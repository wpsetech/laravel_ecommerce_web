<!-----footer start-->
<!---call to action-->

<div class="container-fluid py-4 bg-light">
    <div class="row">
        <div class="col-lg-6">
            <h4 class="text-primary px-3">Browse through our products library!</h4>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-4">

            <div class="container text-center">
                <a href="{{url('allproducts')}}" ><button type="button" class="btn bg-gradient-primary"><i class="fas fa-eye"></i> View All Products</button></a>
            </div>
        </div>


    </div>
</div>
</div>


<!----footer-->
<!--------->
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-lg-3">
           <h4 class="text-primary px-3">E-STORE</h4>
            <h6 class="d-inline px-3">contact@example.com</h6>
            <a style="text-decoration: none; color: #000;" href="#"><h6 class="px-3">+1 347 9376 118</h6></a>
            <div class="text-start px-3">
                <a class="text-primary bg-light rounded-circle px-2" href="#"><i class="fab fa-facebook"></i></a>
                <a class="text-primary rounded-circle bg-light px-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="text-primary rounded-circle bg-light px-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="text-primary rounded-circle bg-light px-2" href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="col-lg-3">
            <h3 class="text-primary">Useful links</h3>
            <ul>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>  Mobile Phones</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   laptops</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   Head Phones</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   Camera</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3">


            <h3 class="text-primary">Our Policy</h3>
            <ul>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>  Homepage</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   Auction</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   Services</p>
                    </a>
                </li>
                <li style=" list-style-type: none;">
                    <a style="text-decoration: none; color: #000;" href="#">
                        <p>
                            <i class="fas fa-angle-double-right text-primary"></i>   About Us</p>
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-lg-3">
            <h3 class="text-primary">
                Subscribe to our <br> Newsletters
            </h3>

            <div style="width: 100%; height: 50px; background-color: #FFF; border-radius: 25px; box-shadow: 1px 1px 5px -2px rgb(0, 0, 0); position: relative;" class="row">
                <form action="{{url('contact')}}" method="post" >
                    @csrf
                    <input style="height: 50px; width: 100%; border-radius: 30px; border: none;" type="email" name="email" placeholder="Enter your Email+Enter" class="input special">
                </form>

            </div>
        </div>

    </div>
    <p class="text-center py-1"><i class="far fa-copyright text-primary"></i> Copyright 2022 || Made by <small><a class="text-primary" href="">Talha Nadeem</a></small></p>







