@extends('layouts.ly_front')

@section('content')

<div class="wrapper light-wrapper page-title-wrapper">
    <div class="container inner text-center">
      <h1 class="page-title">Our Project Desain</h1>
      <div class="wrapper light-wrapper">
        <div class="container inner">
          <div class="blog grid grid-view boxed">
            <div class="row isotope" style="position: relative; height: 2400px;">
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 0%; top: 0px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                 <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-purple">Concept</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Ligula tristique quis risus eget urna mollis ornare porttitor</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>5 Jul 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">3 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 33.3333%; top: 0px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-meander">Business</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Nullam id dolor elit id nibh pharetra augue venenatis</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>18 Jun 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">5 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 66.6667%; top: 0px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-pink">Design</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Ultricies fusce porta elit pharetra augue faucibus</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>14 May 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">7 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 0%; top: 600px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-violet">Ideas</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Morbi leo risus porta eget metus est non commodolacus</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>9 Apr 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">4 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 33.3333%; top: 600px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-green">Workspace</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Mollis adipiscing lorem quis mollis eget lacinia faucibus</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>23 Feb 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">8 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 66.6667%; top: 600px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-red">Teamwork</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Fusce mattis euismod sed diam eget risus amet tempus</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>15 Jan 2018</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">7 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 0%; top: 1200px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-teal">Inspiration</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Tellus vulputate non magna eget urna mollis lacinia mollis</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>12 Dec 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">3 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 33.3333%; top: 1200px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-yellow">Planning</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Elit parturient tristique ornare vel ornare posuere porttitor</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>25 Nov 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">2 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 66.6667%; top: 1200px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-blue">Ideas</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Condimentum vehicula vitae elit libero lacinia interdum</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>4 Oct 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">5 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 0%; top: 1800px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">
                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-leaf">Teamwork</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Donec ullamcorper nulla non metus auctor fringilla</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>12 Sep 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">3 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 33.3333%; top: 1800px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">
                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-rose">Presentation</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Nulla vitae elit libero a pharetra augue mollis</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>25 Aug 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">2 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
              <div class="item post grid-sizer col-md-6 col-lg-4" style="position: absolute; left: 66.6667%; top: 1800px;">
                <div class="box bg-white shadow p-30">
                  <figure class="main mb-30 overlay overlay1 rounded"><a href="{{ route('details') }}"><span class="bg"></span> <img src="{{ asset('front/images/art/b1.jpg') }}" alt="">
                    <figcaption>
                      <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                  </figure>
                  <div class="category"><a href="{{ route('details') }}" class="badge badge-pill bg-orange">Strategy</a></div>
                  <h2 class="post-title"><a href="{{ route('details') }}">Integer posuere erat a ante venenatis dapibus posuere</a></h2>
                  <div class="post-content">
                    <p>Mauris convallis non ligula non interdum. Gravida vulputate convallis nun vestibulum cras imperdiet nun eu dolor diam tempus.</p>
                  </div>
                  <!-- /.post-content -->
                  <div class="meta mb-0"><span class="date"><i class="jam jam-clock"></i>4 Jul 2017</span><span class="comments"><i class="jam jam-message-alt"></i><a href="{{ route('details') }}">5 Comments</a></span></div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.post -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.blog -->
          <div class="space30 d-block d-md-none"></div>
          <div class="pagination">
            <ul>
              <li><a href="{{ route('details') }}" class="pl-0"><i class="jam jam-arrow-left"></i></a></li>
              <li class="active"><a href="{{ route('details') }}"><span>1</span></a></li>
              <li><a href="{{ route('details') }}"><span>2</span></a></li>
              <li><a href="{{ route('details') }}"><span>3</span></a></li>
              <li><a href="{{ route('details') }}" class="pr-0"><i class="jam jam-arrow-right"></i></a></li>
            </ul>
          </div>
          <!-- /.pagination -->
        </div>
        <!-- /.container -->
      </div>
    </div>
    <!-- /.container -->
  </div>

</div>

@endsection
