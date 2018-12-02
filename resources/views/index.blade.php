@extends('master')

@section('title')
    Home
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="http://jmdev.ca/img/truckersmp.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="http://jmdev.ca/img/truckersmp.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="http://jmdev.ca/img/truckersmp.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <h1 class="text-center">Latest code projects</h1>
        <div class="row d-flex justify-content-center">
            @for ($i = 0; $i < 7; $i++)
                <div class="col-lg-3 col-md-6 col-12 mt-5">
                    <div class="card w-100">
                        <img class="card-img-top" src="https://scontent.fymq3-1.fna.fbcdn.net/v/t1.0-9/22540123_1704518592925587_1188637553387241942_n.jpg?_nc_cat=101&_nc_ht=scontent.fymq3-1.fna&oh=9c0090d9ab80f64a33047f4c8e4a99ac&oe=5C84711A" alt="Project Images">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-default float-left"><i class="fas fa-external-link-alt"></i> View</a>
                            <a href="#" class="btn btn-default float-right"><i class="fab fa-github"></i> Code</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <hr>
    </div>
@endsection
