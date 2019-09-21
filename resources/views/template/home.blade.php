@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height"> 
        <div class="row mt">
            <div class="col-lg-12">
            @if(session('warning'))
             <script>
                 alert('{{$warning}}');
             </script>
            @endif
{{--
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" 
                        width="1298px" height="600px" id="tech" align="middle">
                        <param name="allowScriptAccess" value="sameDomain" />
                        <param name="movie" value="{{ localasset('swf/app1.swf') }}" /> 
                        <param name="quality" value="high" />
                        <embed src="{{ localasset('swf/app1.swf') }}" quality="high" 
                               width="1298px" height="600px" name="tech" align="middle" allowScriptAccess="sameDomain" 
                               type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
                </object>
--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="row mtbox">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <span class="li_heart"></span>
                            <h3>{{ $info['refferals'] }}</h3>
                        </div>
                        <p>{{ $info['refferals'] }} People has join because of you!</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_cloud"></span>
                            <h3>+48</h3>
                        </div>
                        <p>48 New image were added in your storage.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_stack"></span>
                            <h3>23</h3>
                        </div>
                        <p>You have 23 unread messages in your inbox.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_news"></span>
                            <h3>+10</h3>
                        </div>
                        <p>More than 10 news were added in your reader.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_data"></span>
                            <h3>OK!</h3>
                        </div>
                        <p>Your server is working perfectly. Relax &amp; enjoy.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><! --/wrapper --> 
</section><!-- /MAIN CONTENT -->
@endsection
