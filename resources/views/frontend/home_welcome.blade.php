  @include('admin.partials._messages')
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <title>Muhammad Hannan Laravel Devel</title>
      <!-- Meta -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="Boootstrap Portfolio/Resume Theme for Developers" />
      <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
      <link rel="shortcut icon" href="favicon.ico" />

      <link href="//fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic" rel="stylesheet"
          type="text/css" />
      <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

      <!-- FontAwesome JS -->
      <script defer src="{{ URL::asset('front') }}/assets/fontawesome/js/all.js"></script>

      <!-- Global CSS -->
      <link rel="stylesheet" href="{{ URL::asset('front') }}/assets/plugins/bootstrap/css/bootstrap.min.css" />

      <!-- github calendar css -->
      <link rel="stylesheet" href="{{ URL::asset('front') }}/assets/plugins/github-calendar/dist/github-calendar.css" />
      <!-- github activity css -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css" />
      <link rel="stylesheet"
          href="{{ URL::asset('front') }}/assets/plugins/github-activity/github-activity-0.1.5.min.css" />

      <!-- Theme CSS -->
      <link id="theme-style" rel="stylesheet" href="{{ URL::asset('front') }}/assets/css/styles.css" />


  </head>

  <body>
      <!-- ******HEADER****** -->
      <header class="header">
          <div class="container clearfix">
              <img class="profile-image img-fluid float-left rounded-circle"
                  src="{{ URL::asset('front') }}/assets/images/profile2.png" alt="profile image"
                  style="width: 150px;" />
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
                  @include('frontend.parts.about')
                  <!--//section-->
                  <section class="latest section">
                      <div class="section-inner shadow-sm rounded">
                          <div>
                              <h2 class="heading">Latest Projects</h2>
                              <div id="filters" class="button-group">
                                  <button class="button is-checked" data-filter="*">All</button>
                                  @foreach ($project_category as $pro_cat)
                                      <button class="button"
                                          data-filter=".cat_{{ $pro_cat->id }}">{{ $pro_cat->title }}</button>
                                  @endforeach
                              </div>
                              <div class="grid">
                                  @foreach ($projects as $project)
                                      <div class="element-item transition cat_{{ $project->category_id }}"
                                          data-category="transition">
                                          <a href="{{ $project->url }}" target="_blank">
                                              <img src="{{ asset('/storage/project/' . $project->image) }}"
                                                  alt="{{ $project->title }}" class="img-thumbnail"
                                                  style="width:200px;">
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
                                          <a href="" target="_blank">{{ $post->title }}</a>
                                          <a href="#">
                                              <span class="badge badge-theme">
                                                  {{ $post['category']['title'] }}</span>
                                          </a>
                                      </h3>
                                      <p class="summary">
                                          {{ $post->body }}
                                      </p>
                                      <p>
                                          <a class="more-link" href="#" target="_blank"><i
                                                  class="fas fa-external-link-alt"></i>Readmore</a>
                                      </p>
                                  </div>

                              @endforeach
                              <!--//item-->
                              <nav aria-label="Page navigation example">
                                  <ul class="pagination">
                                      
                                      {{ $posts->links() }}
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

                            @foreach ($experiences as $experience)
                                
                            
                              <div class="item">
                                  <h3 class="title">
                                      {{ $experience->designation }} -
                                      <span class="place">{{ $experience->company_name }}</span>
                                      <span class="year">({{ $experience->joining_date }} - Present)</span>
                                  </h3>
                                  <p>
                                      {{ $experience->company_details }}
                                  </p>
                              </div>
                              <!--//item-->


                              @endforeach
                              

                             
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
             @include('frontend.parts.primary_info')
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
