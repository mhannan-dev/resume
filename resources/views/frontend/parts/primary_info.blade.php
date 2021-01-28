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
                         <i class="fas fa-mobile"></i><span class="sr-only">Cell:</span><a href="#">+8801744894452</a>
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
                     Here is mentioned my primary skillset:-
                    
                 </p>

                 <div class="skillset">
                     @foreach ($skills as $skill)

                         @if ($skill->getAttribute('choose_platform') == 'framework')
                             <div class="item">
                                 <h3 class="level-title">
                                     {{ $skill->title }}<span class="level-label" data-toggle="tooltip"
                                         data-placement="left" data-animation="true"
                                         title="You can use the tooltip to explain more about your skill level..."><i
                                             class="fas fa-info-circle"></i>{{ $skill->expertise_level }}</span>
                                 </h3>
                                 <div class="level-bar">
                                     <div class="level-bar-inner" data-level="{{ $skill->data_level }}%"></div>
                                 </div>
                                 <!--//level-bar-->
                             </div>
                             <!--//item-->

                         @elseif($skill->getAttribute('choose_platform')=='library')
                             <div class="item">
                                 <h3 class="level-title">
                                     {{ $skill->title }}<span class="level-label" data-toggle="tooltip"
                                         data-placement="left" data-animation="true"
                                         title="You can use the tooltip to explain more about your skill level..."><i
                                             class="fas fa-info-circle"></i>{{ $skill->expertise_level }}</span>
                                 </h3>
                                 <div class="level-bar">
                                     <div class="level-bar-inner" data-level="{{ $skill->data_level }}%"></div>
                                 </div>
                                 <!--//level-bar-->
                             </div>
                             <!--//item-->

                         @elseif($skill->getAttribute('choose_platform')=='programming_language')

                             <div class="item">
                                 <h3 class="level-title">
                                     {{ $skill->title }}<span class="level-label" data-toggle="tooltip"
                                         data-placement="left" data-animation="true"
                                         title="You can use the tooltip to explain more about your skill level..."><i
                                             class="fas fa-info-circle"></i>{{ $skill->expertise_level }}</span>
                                 </h3>
                                 <div class="level-bar">
                                     <div class="level-bar-inner" data-level="{{ $skill->data_level }}%"></div>
                                 </div>
                                 <!--//level-bar-->
                             </div>
                             <!--//item-->
                             @elseif($skill->getAttribute('choose_platform')=='web_design')

                             <div class="item">
                                 <h3 class="level-title">
                                     {{ $skill->title }}<span class="level-label" data-toggle="tooltip"
                                         data-placement="left" data-animation="true"
                                         title="You can use the tooltip to explain more about your skill level..."><i
                                             class="fas fa-info-circle"></i>{{ $skill->expertise_level }}</span>
                                 </h3>
                                 <div class="level-bar">
                                     <div class="level-bar-inner" data-level="{{ $skill->data_level }}%"></div>
                                 </div>
                                 <!--//level-bar-->
                             </div>
                             <!--//item-->

                             
                         @elseif($skill->getAttribute('choose_platform')=='')
                            No skill found
                         @endif
                     @endforeach


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

                    @foreach ($tools_software as $tool_item)
                
                     <li>
                         <i class="fas fa-external-link-alt"></i>{{ $tool_item->title }}
                     </li>

                     @endforeach
                     

                    
                 </ul>

                 <hr />

                 <a class="btn btn-cta-secondary btn-follow" href="https://twitter.com/mhannan44"
                     target="_blank"><i class="fab fa-twitter"></i> Follow on twitter</a>
             </div>
             <!--//content-->
         </div>
         <!--//section-inner-->
     </aside>
     <!--//section-->

     {{-- <aside class="testimonials aside section">
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
     </aside> --}}
     <!--//section-->

     <aside class="education aside section">
         <div class="section-inner shadow-sm rounded">
             <h2 class="heading">Education</h2>
             <div class="content">
                 
                 @foreach ($degree as $key => $degree_item)
                 <div class="item">
                     <h3 class="title">
                         <i class="fas fa-graduation-cap"></i> {{ $degree_item->title }}
                     </h3>
                     <h4 class="university">
                          {{ $degree_item->institute_name }}
                         <span class="year">({{ $degree_item->started_at }}-{{ $degree_item->finished_at }})</span>
                     </h4>
                 </div>
                 @endforeach
                
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
                         <span class="title"><strong>Bengali:</strong></span>
                         <span class="level">Native Speaker <br class="visible-xs" /><i class="fas fa-star"></i>
                             <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                             <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                         </span>
                     </li>
                     <!--//item-->
                     <li class="item">
                         <span class="title"><strong>English:</strong></span>
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
                         <a href="#" target="_blank">PHP Web Development</a> (BITM, Dhaka)
                     </li>
                     <li>
                         <i class="far fa-calendar-alt"></i>
                         <a href="#">Front End Development</a> (freecodecamp.org)
                     </li>
                 </ul>
             </div>
             <!--//content-->
         </div>
         <!--//section-inner-->
     </aside>
     <!--//section-->


 </div>
