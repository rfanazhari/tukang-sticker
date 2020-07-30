

<div class="wrapper dark-wrapper">
   <div class="rev_slider_wrapper fullwidth-container">
      <div id="slider2" class="rev_slider fullwidthbanner" data-version="5.4.7">
         <ul>
             @foreach($slider as $key => $val)
                <li data-transition="fade" data-thumb="">
                    <img src="{{ $val['based_64'] }}" alt="" />
                    <div class="tp-caption font-weight-500 color-white text-center" 
                        data-x="center" 
                        data-y="middle" 
                        data-voffset="['-75','-75','-65','-95']" 
                        data-fontsize="['50','50','35','30']" 
                        data-lineheight="['65','65','50','45']" 
                        data-width="['1000','1000','600','340']" 
                        data-textAlign="['center','center','center','center']" 
                        data-whitespace="['normal','normal','normal','normal']" 
                        data-frames='[{"delay":1000,"speed":1200,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' 
                        data-responsive="on" 
                        data-responsive_offset="on" style="z-index: 9;"> {{ $val['alt'] }}
                    </div>
                    <!-- /.tp-caption -->
                    <div class="tp-caption font-weight-400 color-white text-center" 
                        data-x="center" 
                        data-y="middle" 
                        data-voffset="['0','0','0','0']" 
                        data-fontsize="['26','26','26','20']" 
                        data-lineheight="['36','36','36','30']" 
                        data-width="['1000','1000','600','340']" 
                        data-textAlign="['center','center','center','center']" 
                        data-whitespace="['normal','normal','normal','normal']" 
                        data-frames='[{"delay":1500,"speed":1200,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' 
                        data-responsive="on" 
                        data-responsive_offset="on" style="z-index: 9;"> {{ $val['caption'] }}
                    </div>
                    @if(!empty($val['url']))
                        <a class="tp-caption btn btn-default btn-strong-hover scroll" 
                           data-x="center" 
                           data-y="middle" 
                           data-voffset="['85','85','100','90']" 
                           data-width="['auto','auto','auto','auto']" 
                           data-textAlign="['center','center','center','center']" 
                           data-frames='[{"delay":2000,"speed":1200,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-responsive="on" data-responsive_offset="on" style="z-index: 9;" href="{{ $val['url'] }}">Get in Touch  
                        </a>
                     @endif
                </li>
            @endforeach
         </ul>
         <div class="tp-bannertimer tp-bottom"></div>
      </div>
      <!-- /.rev_slider -->
      <div class="divider">
         <svg xmlns="http://www.w3.org/2000/svg" class="fill-light-wrapper" preserveAspectRatio="none" viewBox="0 0 1070 20.98">
            <path d="M0,0V21H1070V0A6830.24,6830.24,0,0,1,0,0Z" />
         </svg>
      </div>
   </div>
   <!-- /.rev_slider_wrapper -->
</div>