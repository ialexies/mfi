
<div class="jumbotron text-center">
  <div class="container">
    <h1>Mowelfund Project Finder</h1>
    <p class="lead">Welcome to our brand new Laravel Powered Website. This site uses laravel vs. 5.0</p>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="well">
      <h4><b>Filters</b></h4>
      <hr>
      <div class="sidebar-heading">Project Type</div>
      <div class=" sidebar-subcontent  ">              
        @foreach($categories as $category)
        <div class="checkbox">
          <label><input type="checkbox" value="">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
      <div class="sidebar-heading">Tags</div>
      <div class=" sidebar-subcontent  ">   
        <div class="form-group">
          <p>           
            @foreach($tags as $tag)
              {{$tag->name}}
            @endforeach
          </p>
        </div>
      </div>
      <center>
        {{--<button type="button" class="btn btn-primary  btn-block"><i class="material-icons" style="font-size:14px;">line_style</i> Filter</button>--}}
        <button onclick="document.getElementById('btn_search').click()" type="button" class="btn btn-primary  btn-block"><i class="material-icons" style="font-size:14px;">line_style</i> Filter</button>
      

      </center>
    </div>    
    
  </div>
  <div class="col-md-9">
    <div id="content-project">
      
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">

          {{ Form::open(array('method' => 'get', 'class'=>'navbar-form navbar-left', )) }}
            <div class="input-group">
              <input class="form-control" id="search" value="{{ request('search') }}" placeholder="Search title" name="search" type="text" id="search"/>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" id="btn_search">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          {!! Form::close() !!}

          

          <div class="navbar-header">
            <a class="navbar-brand" href="#">{{$projects->total()}} Results</a>
          </div>
          <meta name="viewport" content="width=device-width, initial-scale=1">

  
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle sort-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Sort by  
                  {{request('field','name')=='title'?'title':''}}
                  {{request('field','name')=='budget'?'budget':''}}
                <span style="font-size:1.5em">

                  {{request('field','name')=='title'?(request('sort','asc')=='asc'?'&#9652;':'&#9662;'):''}}
                  
                  {{request('field','name')=='budget'?(request('sort','asc')=='asc'?'&#9652;':'&#9662;'):''}}
                </span>
              </a>
              <ul class="dropdown-menu ">
                <li><a href="{{url('/')}}?search={{request('search')}}&field=title&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">Title</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{url('/')}}?search={{request('search')}}&field=budget&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">Budget</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      
      @foreach($projects as $project)
        <div class="project-item">
          <div class="row">
            <div class="col-md-9">
              <i class="material-icons project-item-icon" style="font-size:14px;">card_travel</i><div class="project-item-title"><h3 > <b> {{$project->title}}</b></h3></div>
              <h5>{{$project->category->name}}</h5>
              <p>{{substr( $project->description, 0, 400 ) }}   ...<a>More</a></p>
              <p><b>
                [
                  @php 
                    $Project_tags=App\Project::findorFail($project->id);
                        foreach($Project_tags->tags as $role){
                        echo $role->name . ",";
                    }
                  @endphp
                ]
               </b></p>
            </div>
            <div class="col-md-3">
              <center>
                <h4><b><p> {{ "Php ". number_format( $project->budget, 2) }}</p></b></h4>
                <button type="button" class="btn btn-primary  btn-block"> Details</button>
              </center>
            </div>
          </div>
        </div>
        <hr>
      @endforeach

    </div>

    <nav>
      <ul class="pagination pull-right">
        {{$projects->setPath('/projects')->links('vendor.pagination.bootstrap-4')}}
      </ul>
    </nav>

  </div>
</div>