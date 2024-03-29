@extends('layouts.app')

@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height"> 
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                <h4><i class="fa fa-compass"></i> Menu List</h4>
                <table class="table table-condense">
		    <thead>
			<tr>
                            <th width="10px"></th>
                            <th>Menu Name</th>
                            <th class="hidden-xs">Description</th>
                            <th class="hidden-xs">URL</th>
                            <th class="">Parent</th>
                            <th width="150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $m)
			<tr>
			    <td>
                                <label>
                                    <input type="checkbox" value="{{ $m->id }}">
                                </label>
                            </td>
                            <td class="">{{ $m->text }}</td>
                            <td class="hidden-xs">{{ $m->description }}</td>
                            <td class="hidden-xs">{{ $m->url }}</td>
			    <td class="">{{ $m->parent }}</td>
			    <td>
                                <a class="btn btn-theme" href="/menu/{{ $m->id }}/edit">Edit</a>
                                <button class="btn btn-theme" type="button">Delete</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
		</table>
                <div class="centered">
		    <a class="btn btn-theme04" href="/menu/create">Add Menu</a>
                </div>
                </div>
            </div>
        </div>
    </section><! --/wrapper --> 
</section><!-- /MAIN CONTENT -->
@endsection
