@auth
              <div class="profile">
                  <p class="centered"><a href="/profile"><img src="{{ asset('users/'.auth()->user()->foto) }}" class="img-circle" width="60"></a>
                  <h5 class="centered">{{ auth()->user()->name }}</h5>
                  <div class="badge centered hidden-lg" style="width:100%" >
		    Code : 
                      <span class="badge">
                          <a href="{{ url('/').'?reff='.auth()->user()->affiliate_code }}">{{ auth()->user()->affiliate_code }}</a>
                      </span>
		  </div>
                  </p>
              </div>
@endauth
