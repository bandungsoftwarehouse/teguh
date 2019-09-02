@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height"> 
        <div class="row mt">
            <div class="col-lg-12">
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
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    </section><! --/wrapper --> 
</section><!-- /MAIN CONTENT -->
@endsection
