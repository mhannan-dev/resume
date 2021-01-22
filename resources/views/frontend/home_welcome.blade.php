  @include('admin.partials._messages')
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <title>Boootstrap Portfolio/Resume Theme for Developers</title>
      <!-- Meta -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="Boootstrap Portfolio/Resume Theme for Developers" />
      <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
      <link rel="shortcut icon" href="favicon.ico" />

      <link href="https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic" rel="stylesheet"
          type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

      <!-- FontAwesome JS -->
      <script defer src="{{ URL::asset('front') }}/assets/fontawesome/js/all.js"></script>

      <!-- Global CSS -->
      <link rel="stylesheet" href="{{ URL::asset('front') }}/assets/plugins/bootstrap/css/bootstrap.min.css" />

      <!-- github calendar css -->
      <link rel="stylesheet" href="{{ URL::asset('front') }}/assets/plugins/github-calendar/dist/github-calendar.css" />
      <!-- github activity css -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css" />
      <link rel="stylesheet" href="{{ URL::asset('front') }}/assets/plugins/github-activity/github-activity-0.1.5.min.css" />

      <!-- Theme CSS -->
      <link id="theme-style" rel="stylesheet" href="{{ URL::asset('front') }}/assets/css/styles.css" />

      
  </head>

  <body>
      <!-- ******HEADER****** -->
      <header class="header">
          <div class="container clearfix">
              <img class="profile-image img-fluid float-left rounded-circle"
                  src="{{ URL::asset('front') }}/assets/images/profile.png" alt="profile image" />
              <div class="profile-content float-left">
                  <h1 class="name">M Hannan</h1>
                  <h2 class="desc">Web Developer</h2>
                  <ul class="social list-inline">
                      <li class="list-inline-item">
                          <a href="#"><i class="fab fa-twitter"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="#"><i class="fab fa-github-alt"></i></a>
                      </li>
                      <li class="list-inline-item">
                          <a href="#"><i class="fab fa-stack-overflow"></i></a>
                      </li>
                     
                  </ul>
              </div>
              <!--//profile-->
              <a class="btn btn-cta-primary float-right" href="" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-paper-plane"></i> Contact Me</a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              @include('admin.partials._messages')
                              <form action="{{ route('save_contact') }}" method="post" id="contact_form">
                                  @csrf

                                  <div class="form-group">
                                      <label for="full_name">Full Name</label>
                                      <input type="text"
                                          class="form-control form-control-sm {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                          id="exampleInputEmail1" aria-describedby="nameHelp" name="full_name"
                                          placeholder="Enter full name">
                                  </div>


                                  <div class="form-group">
                                      <label for="name">Mobile No</label>
                                      <input name="mobile_no" type="text"
                                          class="form-control form-control-sm {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}"
                                          id="exampleInputEmail1" aria-describedby="mobileHelp"
                                          placeholder="Enter valid mobile no">
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Email</label>
                                      <input name="email" type="email"
                                          class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                          id="exampleInputEmail1" aria-describedby="emailHelp"
                                          placeholder="Enter valid email">
                                  </div>

                                  <div class="form-group">
                                      <label for="name">Subject</label>
                                      <input name="subject" type="text"
                                          class="form-control form-control-sm {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                          id="subjectHelp" aria-describedby="subjectHelp" placeholder="Enter subject">

                                      @if ($errors->has('subject'))
                                          <div class="invalid-feedback">
                                              <strong>{{ $errors->first('subject') }}</strong>
                                          </div>
                                      @endif
                                  </div>

                                  <div class="form-group">
                                      <label for="messageHelp">Message</label>

                                      <textarea
                                          class="form-control form-control-sm {{ $errors->has('message') ? 'is-invalid' : '' }}"
                                          id="message" rows="3" name="message">{{ old('message') }}</textarea>

                                      @if ($errors->has('message'))
                                          <div class="invalid-feedback">
                                              <strong>{{ $errors->first('message') }}</strong>
                                          </div>
                                      @endif
                                  </div>

                                  <button type="submit" class="btn btn-success btn-sm mt-0">Submit</button>
                                  <button type="button" class="btn btn-warning btn-sm mt-0"
                                      data-dismiss="modal">Close</button>
                              </form>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
          <!--//container-->
      </header>
      <!--//header-->

      <div class="container sections-wrapper">
          <div class="row">
              <div class="primary col-lg-8 col-12">
                  <section class="about section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">About Me</h2>
                          <div class="content">
                              <p>
                                  Write a brief intro about yourself. It's a good idea to
                                  include your personal interests and hobbies as well. Lorem
                                  ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                  commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                                  penatibus et magnis dis parturient montes, nascetur ridiculus
                                  mus. Donec quam felis, ultricies nec. Commodo ligula eget
                                  dolor. Aenean massa.
                              </p>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </section>
                  <!--//section-->

                  <section class="latest section">
                      <div class="section-inner shadow-sm rounded">



                          <div>
                              <h2 class="heading">Latest Projects</h2>
                              <div id="filters" class="button-group">
                                <button class="button is-checked" data-filter="*">All</button>
                                  @foreach ($project_category as $pro_cat)
                                  <button class="button" data-filter=".cat_{{ $pro_cat->id }}">{{ $pro_cat->title }}</button>
                                  @endforeach
                              </div>
                              <div class="grid">
                                @foreach($projects as $project)
                                <div class="element-item transition cat_{{ $project->category_id }}" data-category="transition">
                                    <a href="">
                                        <img src="{{ URL::asset('front') }}/assets/images/projects/1(6).jpg" alt="">
                                        <h3 class="name">{{ $project->title }}</h3>
                                    </a>
                                </div>
                                @endforeach

                              </div>
                          </div>

                          <!-- isotope -->

                      </div>
                      <!--//section-inner-->
                  </section>
                  <!--//section-->

                  <section class="projects section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Blogs</h2>
                          <div class="content">
                              @foreach ($posts as $post)
                              <div class="item">
                                  <h3 class="title">
                                      <a href=""
                                          target="_blank">{{ $post->title }}</a>
                                          <a href="#">
                                          <span class="badge badge-theme">
                                              {{ $post['category']['title'] }}</span>
                                              </a>
                                  </h3>
                                  <p class="summary">
                                      {{ $post->body }}
                                  </p>
                                  <p>
                                      <a class="more-link"
                                          href="#"
                                          target="_blank"><i class="fas fa-external-link-alt"></i>Readmore</a>
                                  </p>
                              </div>
                                  
                              @endforeach
                              <!--//item-->
                              <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                              <span class="sr-only">Previous</span>
                                          </a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                              <span class="sr-only">Next</span>
                                          </a>
                                      </li>
                                  </ul>
                              </nav>


                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </section>
                  <!--//section-->


                  <section class="projects section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Popular Blogs</h2>
                          <div class="content">
                              <div class="item">
                                  <h3 class="title">
                                      <a href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap4-resume-cv-template-for-developers-pillar/"
                                          target="_blank">Pillar - Free Boootstrap Resume/CV Template for
                                          Developers</a>
                                      <span class="badge badge-theme">Free</span>
                                  </h3>
                                  <p class="summary">
                                      Provide a brief description of your project. Ut enim ad
                                      minima veniam, quis nostrum exercitationem ullam corporis
                                      suscipit laboriosam, nisi ut aliquid ex ea commodi
                                      consequatu.
                                  </p>
                                  <p>
                                      <a class="more-link"
                                          href="https://themes.3rdwavemedia.com/bootstrap-templates/resume/free-bootstrap4-resume-cv-template-for-developers-pillar/"
                                          target="_blank"><i class="fas fa-external-link-alt"></i>Download Now</a>
                                  </p>
                              </div>
                              <!--//item-->
                              <div class="item">
                                  <h3 class="title">
                                      <a href="https://themes.3rdwavemedia.com/bootstrap-templates/speciality/devblog-free-bootstrap-4-blog-template-for-developers/"
                                          target="_blank">DevBlog - Free Boootstrap Blog Template for Developers</a>
                                      <span class="badge badge-theme">Free</span>
                                  </h3>
                                  <p class="summary">
                                      Provide a brief description of your project. Maecenas ornare
                                      ultricies risus, in fermentum augue consectetur in.
                                      Vestibulum vitae mauris iaculis, sollicitudin velit in,
                                      molestie nulla.
                                  </p>
                                  <p>
                                      <a class="more-link"
                                          href="https://themes.3rdwavemedia.com/bootstrap-templates/speciality/devblog-free-bootstrap-4-blog-template-for-developers/"
                                          target="_blank"><i class="fas fa-external-link-alt"></i>Download Now</a>
                                  </p>
                              </div>
                              <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                              <span class="sr-only">Previous</span>
                                          </a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                              <span class="sr-only">Next</span>
                                          </a>
                                      </li>
                                  </ul>
                              </nav>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </section>
                  <!--//section-->

                  <section class="experience section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Work Experience</h2>
                          <div class="content">
                              <div class="item">
                                  <h3 class="title">
                                      Co-Founder & Lead Developer -
                                      <span class="place"><a href="#">Startup Hub</a></span>
                                      <span class="year">(2014 - Present)</span>
                                  </h3>
                                  <p>
                                      Aenean leo ligula, porttitor eu, consequat vitae, eleifend
                                      ac, enim. Aliquam lorem ante, dapibus in, viverra quis,
                                      feugiat a, tellus. Phasellus viverra nulla ut metus varius
                                      laoreet. Donec vitae sapien ut libero venenatis faucibus.
                                      Nullam quis ante. Etiam sit amet orci eget eros faucibus
                                      tincidunt.
                                  </p>
                              </div>
                              <!--//item-->
                              <div class="item">
                                  <h3 class="title">
                                      Software Engineer -
                                      <span class="place"><a href="#">Google</a></span>
                                      <span class="year">(2013 - 2014)</span>
                                  </h3>
                                  <p>
                                      Vivamus a tortor eu turpis pharetra consequat quis non
                                      metus. Aliquam aliquam, orci eu suscipit pellentesque,
                                      mauris dui tincidunt enim. Sed fringilla mauris sit amet
                                      nibh. Donec sodales sagittis magna.
                                  </p>
                              </div>
                              <!--//item-->

                              <div class="item">
                                  <h3 class="title">
                                      Software Engineer -
                                      <span class="place"><a href="#">eBay</a></span>
                                      <span class="year">(2012 - 2013)</span>
                                  </h3>
                                  <p>
                                      Maecenas tempus, tellus eget condimentum rhoncus, sem quam
                                      semper libero, sit amet adipiscing sem neque sed ipsum.
                                  </p>
                              </div>
                              <!--//item-->
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </section>
                  <!--//section-->
                  <section class="github section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">My GitHub</h2>
                          <p>
                              You can embed your GitHub contribution graph calendar using
                              IonicaBizau's
                              GitHub Calendar
                              widget.
                          </p>

                          <!--//github-graph-->


                          <div id="ghfeed" class="ghfeed"></div>




                          <!--//ghfeed-->
                      </div>
                      <!--//secton-inner-->
                  </section>
                  <!--//section-->
              </div>
              <!--//primary-->
              <div class="secondary col-lg-4 col-12">
                  <aside class="info aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading sr-only">Basic Information</h2>
                          <div class="content">
                              <ul class="list-unstyled">
                                  <li>
                                      <i class="fas fa-map-marker-alt"></i>
                                      <span class="sr-only">Location:</span>
                                      Dhaka, Bangladesh
                                  </li>
                                  <li>
                                      <i class="fas fa-envelope"></i><span class="sr-only">Email:</span><a
                                          href="#">mdhannan.info@gmail.com</a>
                                  </li>

                                  <li>
                                      <i class="fas fa-mobile"></i><span class="sr-only">Cell:</span><a
                                          href="#">+8801744894452</a>
                                  </li>

                                  
                              </ul>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//aside-->

                  <aside class="skills aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Skills</h2>
                          <div class="content">
                              <p class="intro">
                                  Intro about your skills goes here. Keep the list lean and only
                                  show your primary skillset. You can always provide a link to
                                  your Linkedin or Github profile so people can get more info
                                  there.
                              </p>

                              <div class="skillset">
                                  <div class="item">
                                      <h3 class="level-title">
                                          Python &amp; Django<span class="level-label" data-toggle="tooltip"
                                              data-placement="left" data-animation="true"
                                              title="You can use the tooltip to explain more about your skill level..."><i
                                                  class="fas fa-info-circle"></i>Expert</span>
                                      </h3>
                                      <div class="level-bar">
                                          <div class="level-bar-inner" data-level="96%"></div>
                                      </div>
                                      <!--//level-bar-->
                                  </div>
                                  <!--//item-->

                                  <div class="item">
                                      <h3 class="level-title">
                                          Javascript &amp; jQuery<span class="level-label" data-toggle="tooltip"
                                              data-placement="left" data-animation="true"
                                              title="You can use the tooltip to explain more about your skill level..."><i
                                                  class="fas fa-info-circle"></i>Expert</span>
                                      </h3>
                                      <div class="level-bar">
                                          <div class="level-bar-inner" data-level="96%"></div>
                                      </div>
                                      <!--//level-bar-->
                                  </div>
                                  <!--//item-->

                                  <div class="item">
                                      <h3 class="level-title">
                                          HTML5, CSS3, SASS &amp; LESS<span class="level-label" data-toggle="tooltip"
                                              data-placement="left" data-animation="true"
                                              title="You can use the tooltip to explain more about your skill level..."><i
                                                  class="fas fa-info-circle"></i>Expert</span>
                                      </h3>
                                      <div class="level-bar">
                                          <div class="level-bar-inner" data-level="96%"></div>
                                      </div>
                                      <!--//level-bar-->
                                  </div>
                                  <!--//item-->

                                  <div class="item">
                                      <h3 class="level-title">
                                          Ruby on Rails<span class="level-label" data-toggle="tooltip"
                                              data-placement="left" data-animation="true"
                                              title="You can use the tooltip to explain more about your skill level..."><i
                                                  class="fas fa-info-circle"></i>Pro</span>
                                      </h3>
                                      <div class="level-bar">
                                          <div class="level-bar-inner" data-level="85%"></div>
                                      </div>
                                      <!--//level-bar-->
                                  </div>
                                  <!--//item-->


                              </div>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->
                  <aside class="credits aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Software And Tools</h2>
                          <div class="content">
                              <ul class="list-unstyled pb-2">
                                  <li>
                                      <a href="https://getbootstrap.com/" target="_blank"><i
                                              class="fas fa-external-link-alt"></i>Bootstrap</a>
                                  </li>
                                  <li>
                                      <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank"><i
                                              class="fas fa-external-link-alt"></i>FontAwesome</a>
                                  </li>
                                  <li>
                                      <a href="https://jquery.com/" target="_blank"><i
                                              class="fas fa-external-link-alt"></i>jQuery</a>
                                  </li>
                                  <li>
                                      <a href="https://github.com/IonicaBizau/github-calendar" target="_blank"><i
                                              class="fas fa-external-link-alt"></i>GitHub Calendar
                                          Plugin</a>
                                  </li>

                                  <li>
                                      <a href="https://caseyscarborough.com/projects/github-activity/"
                                          target="_blank"><i class="fas fa-external-link-alt"></i>GitHub Activity
                                          Stream</a>
                                  </li>

                                  <li>
                                      <a href="https://github.com/sdepold/jquery-rss" target="_blank"><i
                                              class="fas fa-external-link-alt"></i>jQuery RSS</a>
                                  </li>

                                  <li>
                                      Profile image:
                                      <a href="https://www.flickr.com/photos/dotbenjamin/2577394151" target="_blank">Ben
                                          Smith</a>
                                  </li>
                              </ul>

                              <hr />





                              <a class="btn btn-cta-secondary btn-follow" href="https://twitter.com/3rdwave_themes"
                                  target="_blank"><i class="fab fa-twitter"></i> Follow on twitter</a>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->

                  <aside class="testimonials aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Testimonials</h2>
                          <div class="content">
                              <div class="item">
                                  <blockquote class="quote">
                                      <p>
                                          <i class="fas fa-quote-left"></i>James is an excellent
                                          software engineer and he is passionate about what he does.
                                          You can totally count on him to deliver your projects!
                                      </p>
                                  </blockquote>
                                  <p class="source">
                                      <span class="name">Tim Adams</span><br /><span class="title">Curabitur
                                          commodo</span>
                                  </p>
                              </div>
                              <!--//item-->

                              <p>
                                  <a class="more-link" href="#"><i class="fas fa-external-link-alt"></i>More on
                                      Linkedin</a>
                              </p>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->

                  <aside class="education aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Education</h2>
                          <div class="content">
                              <div class="item">
                                  <h3 class="title">
                                      <i class="fas fa-graduation-cap"></i> MSc Computer Science
                                  </h3>
                                  <h4 class="university">
                                      University College London
                                      <span class="year">(2011-2012)</span>
                                  </h4>
                              </div>
                              <!--//item-->
                              <div class="item">
                                  <h3 class="title">
                                      <i class="fas fa-graduation-cap"></i> BSc Computer Science
                                  </h3>
                                  <h4 class="university">
                                      University of Bristol <span class="year">(2008-2011)</span>
                                  </h4>
                              </div>
                              <!--//item-->
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->

                  <aside class="languages aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Languages</h2>
                          <div class="content">
                              <ul class="list-unstyled">
                                  <li class="item">
                                      <span class="title"><strong>English:</strong></span>
                                      <span class="level">Native Speaker <br class="visible-xs" /><i
                                              class="fas fa-star"></i>
                                          <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                          <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                      </span>
                                  </li>
                                  <!--//item-->
                                  <li class="item">
                                      <span class="title"><strong>Spanish:</strong></span>
                                      <span class="level">Professional Proficiency
                                          <br class="visible-sm visible-xs" /><i class="fas fa-star"></i>
                                          <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                          <i class="fas fa-star-half"></i></span>
                                  </li>
                                  <!--//item-->
                              </ul>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->




                  <aside class="list conferences aside section">
                      <div class="section-inner shadow-sm rounded">
                          <h2 class="heading">Certifications</h2>
                          <div class="content">
                              <ul class="list-unstyled">
                                  <li>
                                      <i class="far fa-calendar-alt"></i>
                                      <a href="#" target="_blank">WWDC 2020</a> (Dhaka)
                                  </li>
                                  <li>
                                      <i class="far fa-calendar-alt"></i>
                                      <a href="#">Hive</a> (Seattle)
                                  </li>
                              </ul>
                          </div>
                          <!--//content-->
                      </div>
                      <!--//section-inner-->
                  </aside>
                  <!--//section-->


              </div>
              <!--//secondary-->
          </div>
          <!--//row-->
      </div>
      <!--//masonry-->

      <!-- ******FOOTER****** -->
      <footer class="footer">
          <div class="container text-center">
              <!--/* This template is free as long as you keep the attribution link below. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
              <small class="copyright">Designed with <i class="fas fa-heart"></i> by
                  <a title="Xiaoying Riley" href="https://themes.3rdwavemedia.com" target="_blank">Muhammad Hannan
                      Ali</a>
              </small>
          </div>
          <!--//container-->
      </footer>
      <!--//footer-->

      <!-- Javascript -->
      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/plugins/jquery-3.4.1.min.js"></script>
      {{-- Animation Gsap --}}
      {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js" integrity="sha512-5/OHwmQzDSBS0Ous4/hlYoWLHd06/d2r7LdKZQVBXOA6PvOqWVXtdboiLTU7lQTGyVoKVTNkwi0ol4gHGlw5ww==" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js" integrity="sha512-RvUydNGlqYJapy0t4AH8hDv/It+zKsv4wOQGb+iOnEfa6NnF2fzjXgRy+FDjSpMfC3sjokNUzsfYZaZ8QAwIxg==" crossorigin="anonymous"></script> --}}

      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/plugins/popper.min.js"></script>
      {{-- Form validation --}}
      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/plugins/jquery.validate.min.js"></script>
      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/plugins/bootstrap/js/bootstrap.min.js">
      </script>
      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/plugins/jquery-rss/dist/jquery.rss.min.js">
      </script>
      <!-- github calendar plugin -->
      <script type="text/javascript"
          src="{{ URL::asset('front') }}/assets/plugins/github-calendar/dist/github-calendar.min.js"></script>
      <!-- github activity plugin -->
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js"></script>
      <script type="text/javascript"
          src="{{ URL::asset('front') }}/assets/plugins/github-activity/github-activity-0.1.5.min.js"></script>
      <!-- custom js -->
      <script type="text/javascript" src="{{ URL::asset('front') }}/assets/js/main.js"></script>

      <script src="//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
      
      <script type="text/javascript">
          // external js: isotope.pkgd.js

          // init Isotope
          var $grid = $('.grid').isotope({
              itemSelector: '.element-item',
              layoutMode: 'fitRows',
              getSortData: {
                  name: '.name',
                  symbol: '.symbol',
                  number: '.number parseInt',
                  category: '[data-category]',
                  weight: function(itemElem) {
                      var weight = $(itemElem).find('.weight').text();
                      return parseFloat(weight.replace(/[\(\)]/g, ''));
                  }
              }
          });

          // filter functions
          var filterFns = {
              // show if number is greater than 50
              numberGreaterThan50: function() {
                  var number = $(this).find('.number').text();
                  return parseInt(number, 10) > 50;
              },
              // show if name ends with -ium
              ium: function() {
                  var name = $(this).find('.name').text();
                  return name.match(/ium$/);
              }
          };

          // bind filter button click
          $('#filters').on('click', 'button', function() {
              var filterValue = $(this).attr('data-filter');
              // use filterFn if matches value
              filterValue = filterFns[filterValue] || filterValue;
              $grid.isotope({
                  filter: filterValue
              });
          });

          // bind sort button click
          $('#sorts').on('click', 'button', function() {
              var sortByValue = $(this).attr('data-sort-by');
              $grid.isotope({
                  sortBy: sortByValue
              });
          });

          // change is-checked class on buttons
          $('.button-group').each(function(i, buttonGroup) {
              var $buttonGroup = $(buttonGroup);
              $buttonGroup.on('click', 'button', function() {
                  $buttonGroup.find('.is-checked').removeClass('is-checked');
                  $(this).addClass('is-checked');
              });
          });

      </script>

     
      <!-- Page specific script -->
      <script>
          $(function() {
              $.validator.setDefaults({
                  submitHandler: function() {
                      alert("Form successful submitted!");
                  }
              });
              $('#contact_form').validate({

                  rules: {
                      full_name: {
                          required: true,
                          full_name: true,
                      },
                      mobile_no: {
                          required: true,
                          mobile_no: true,
                      },
                      email: {
                          required: true,
                          email: true,
                      },
                      subject: {
                          required: true,
                          subject: true,
                      },
                      message: {
                          required: true,
                          message: true,
                      },
                  },
                  messages: {

                      full_name: {
                          required: "Please enter full name",
                          full_name: "Please enter full name"
                      },
                      mobile_no: {
                          required: "Please enter mobile no",
                          mobile_no: "Please enter mobile no"
                      },
                      email: {
                          required: "Please enter a email address",
                          email: "Please enter a vaild email address"
                      },

                      subject: {
                          required: "Please enter subject",
                          subject: "Please enter subject"
                      },

                      message: {
                          required: "Please enter message",
                          message: "Please enter message"
                      },


                  },
                  errorElement: 'span',
                  errorPlacement: function(error, element) {
                      error.addClass('invalid-feedback');
                      element.closest('.form-group').append(error);
                  },
                  highlight: function(element, errorClass, validClass) {
                      $(element).addClass('is-invalid');
                  },
                  unhighlight: function(element, errorClass, validClass) {
                      $(element).removeClass('is-invalid');
                  }
              });
          });

      </script>

  </body>

  </html>
