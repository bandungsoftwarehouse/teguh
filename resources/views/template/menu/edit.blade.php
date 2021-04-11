@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height"> 
        <div class="row mt">
            <div class="col-lg-12">
                <div class="darkblue-panel">
                    <form class="form-horizontal style-form" action="/menu/{{ $menu->id }}" method="post">
                    @csrf 
		    {{ method_field('PUT') }}
                    <div class="row darkblue-heder">
                        <h4>
                            <i class="fa fa-compass"></i>
                            Edit Menu Form
                        </h4>
                    </div>
                    <div class="row form-panel">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Menu Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $menu->text }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $menu->description }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $menu->url }}">
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
                                <select multiple="" name="group" class="form-control">
                                @foreach($groups as $group)
				    <option value="{{$group->id}}"
                                    >{{ $group->groupname }}</option>
                                @endforeach
        			</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Icon</label>
                            <div class="col-sm-10">
                                @foreach($icons as $icon)
                                <div class="col-md-2">
				<input type="radio" name="icon" value="{{ $icon['class'] }}"
                                @if($menu->icon === $icon['class'])
                                checked="checked"
                                @endif
                                >
				<i class="fa fa-{{ $icon['class'] }}"></i>
                                </div>
				@endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Enable</label>
                            <div class="col-sm-10">
                                <div class="switch has-switch">
                                    <div class="switch-animate switch-on">
                                        <input type="checkbox" checked="checked" data-toggle="switch">
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
