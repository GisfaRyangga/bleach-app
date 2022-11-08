@extends('layout/main')

@section('container')
<section id="shinigami" class="article text-center">
            <div class="container shadow-ms">
                <div class="row text-center">   
                    <div class="col">
                        <h2>Choose Your Fighter!</h2>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-3 text-dark">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow p"><a class="card-box" href="/ichigo">
                            <img src="img/ichigo.jpg" class="card-img-top" alt="ichigo">
                            <div class="card-body">
                                <h5 class="card-title">Kurosaki Ichigo</h5>
                                <p class="card-text">Substitute Soul Reaper</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow p"><a class="card-box" href="/aizen">
                            <img src="img/aizen.jpg" class="card-img-top" alt="aizen">
                            <div class="card-body">
                                <h5 class="card-title">Sōsuke Aizen</h5>
                                <p class="card-text">The False God</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow p"><a class="card-box" href="/yamamoto">
                            <img src="img/yamamoto.jpg" class="card-img-top" alt="yamamoto">
                            <div class="card-body">
                                <h5 class="card-title">Genryūsai Shigekuni Yamamoto</h5>
                                <p class="card-text">Founder of the Gotei</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow p"><a class="card-box" href="/yhwach">
                            <img src="img/yhwach.jpg" class="card-img-top" alt="yhwach">
                            <div class="card-body">
                                <h5 class="card-title">Yhwach</h5>
                                <p class="card-text">Father of the Quincy</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card shadow p"><a class="card-box" href="/shunsui">
                            <img src="img/shunsui.jpg" class="card-img-top" alt="shunsui">
                            <div class="card-body">
                                <h5 class="card-title">Shunsui Kyōraku</h5>
                                <p class="card-text">The Laid-Back Captain</p>
                            </div>
                            </a>
                        </div>
                    </div>  
                </div>
            </div>
        </section>
        <!--akhir article-->
@endsection

