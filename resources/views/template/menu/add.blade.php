@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height"> 
        <div class="row mt">
            <div class="col-lg-12">
                <div class="darkblue-panel">
                    <form class="form-horizontal style-form" action="/menu/add" method="post">
                    @csrf 
                    <div class="row darkblue-heder">
                        <h4>
                            <i class="fa fa-compass"></i>
                               Add Menu Form
                        </h4>
                    </div>
                    <div class="row form-panel">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Menu Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Parent Menu</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Group(s) Access</label>
                            <div class="col-sm-10">
                                <select multiple="" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
        			</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Enable</label>
                            <div class="col-sm-10">
                                <div class="switch has-switch">
                                    <div class="switch-animate switch-on">
					<input type="checkbox" data-toggle="switch"
                                        >
                                        <span class="switch-left">ON</span>
					<label>&nbsp;</label>
                                        <span class="switch-right">OFF</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer>
                        <div class="centered">
                            <button type="submit" class="btn btn-theme04">Save</button>
                            <a class="btn btn-primary" href="/menu">Cancel</a>
                        </div>
                        <br>
                    </footer>
                    </form>
                </div>
            </div>
        </div>
    </section><! --/wrapper --> 
</section><!-- /MAIN CONTENT -->
@endsection
