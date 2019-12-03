@extends('layouts.user')
@section('user-content')
    <div class="container">

        @foreach($eletions as $eletion)
            
            <h1 class="alert alert-primary" role="alert">{{$eletion->name}}</h1>
            @foreach($eletion->details as $detail)
            
            <div class="card mb-3">
                    <div class="card-header">{{ $detail->position_name }}</div>
                    <div class="card-body">

                       

                            <div class="row text-center">

                                @if($eletion->start > date('H:i:s'))
                                    <div class="alert alert-danger" role="alert">
                                        voted will be start: {{ date("h:i a", strtotime($eletion->start)) }}
                                    </div>
                                @else
                                    @foreach($detail->candidates as $candidate)

                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$candidate->fullname}}</h5>
                                            <p class="card-text">{{$candidate->party->name}}</p>
                                        </div>
                                        <div class="card-footer">

                                                @if($eletion->end < date('H:i:s'))
                                                    <a class="btn btn-primary" href="#" >Total Vote:
                                                        {{App\Vote::where([['candidate_id',$candidate->id],['user_id',auth()->user()->id],['election_id',$eletion->id],['election_detail_id',$detail->id]])->count()}}
                                                    </a>
                                                @else 
                                   
                                                    @if(App\Vote::where([['user_id',auth()->user()->id],['election_id',$eletion->id],['election_detail_id',$detail->id]])->count()<=0)

                                                    <a class="btn btn-success" href="{{ route('vote.place') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('vote-form').submit();">
                                                    Vote Now
                                                    </a>
                                                    <form id="vote-form" action="{{ route('vote.place') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="candidate" value="{{$candidate->id}}"/>
                                                        <input type="hidden" name="election_detail" value="{{$detail->id}}"/>
                                                        <input type="hidden" name="election" value="{{$eletion->id}}"/>
                                                        <input type="hidden" name="position_id" value="{{$candidate->position_id}}"/>
                                                        <input type="hidden" name="subadmin_id" value="{{$candidate->party->id}}"/>
                                                    </form>

                                                    @endif

                                                @endif

                                            
                                        </div>
                                        </div>
                                    </div>
                                   
                                    @endforeach

                                @endif
                            </div>
                    </div>
            </div>

            @endforeach
        @endforeach
        
    </div>
@endsection