@extends('layouts.app', ['title' => 'Profil'])

@section('content')

    @include('partials._slide')
   <div class="container" id="profil">
       <div class="col-md-6">
           <div class="panel panel-default">
               <div class="panel-body">
                       <hr>
                       <a href="/uploads/avatar/{{$actifuser->image}}"> <img src="/uploads/avatar/{{$actifuser->image}}" style="width: 200px; height: 200px; float: left; border-radius: 5px; margin-right: 8%;"></a>
                       <h1>{{$actifuser->name}}</h1>
                       <p>Membre depuis le {{ $actifuser->created_at->format('d - m - Y') }} </p>
                       <p>Addresse email : {{$actifuser->email}}</p>
                       <p>Pseudo : {{$actifuser->pseudo}}</p>


                       <form enctype="multipart/form-data" action="{{route('completprofil')}}" method="post">
                           {{ csrf_field() }}
                           <input type="file" name="avatar">
                           <input type="submit" class="btn btn-primary btn-sm" value="Metre a jour la photo">
                       </form>
                       <hr>
                       <a href="{{route('completprofil')}}" class="btn btn-success">
                           Metre a jour mon profil
                       </a>
               </div>
           </div>
       </div>
   </div>
@stop