@extends('layouts.app', ['title' => 'Contact'])

@section('content')

       <div class="col-lg-2"></div>
       <div class="col-lg-8">
           <h2>Nous contacter</h2>
           <p>Ouvert a toutes vos  <a href="{{config('admail.admin-mail')}}">questions ou suggestions </a> </p>
           <form action="{{route('contact')}}" method="POST">
               {{csrf_field()}}

               <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                   <label for="name">Nom</label>
                   <input type="text" id="name" name="name" placeholder="Votre nom " class="form-control" required>
                   {!!$errors->first('name' , '<p class="help-block">:message</p>') !!}
               </div>

               <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                   <label for="mail">Email</label>
                   <input type="text" id="mail" name="email" placeholder="Votre email " class="form-control" required>
                   {!!$errors->first('email' , '<p class="help-block">:message</p>') !!}
               </div>

               <div class="form-group {{$errors->has('msg') ? 'has-error' : ''}}">
                   <label for="msg">Message</label>
                   <textarea name="msg" id="msg" cols="30" rows="10" class="form-control" placeholder="Votre message" required></textarea>
                   {!!$errors->first('msg' , '<p class="help-block">:message</p>') !!}
               </div>

               <div class="form-group">
                   <input class="form-control btn btn-primary" type="submit" value="Envoyer" >
               </div>
           </form>
       </div>
       <div class="col-lg-2"></div>
@stop