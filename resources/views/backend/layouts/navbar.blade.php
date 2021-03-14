<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz App</title>
        <link type="text/css" href="{{asset('edmin/bootstrap/css/bootstrap.min.css')}}"rel="stylesheet">
        <link type="text/css" href="{{asset('edmin/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('edmin/css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('edmin/images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            
    </head>
    <body >
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner"  style="background-color: #f9e9b6;
background-image: linear-gradient(90deg, #f9e9b6 0%, #f5c464 100%);
">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="{{url('/')}}">Quiz_App </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                        <li><a href="{{route('quiz.create')}}"><i class="icon-arrow-up"></i>Quiz</a></li>
                            <li ><a href="{{route('assign.exam')}}"><i class="icon-pencil"></i>Exam</a></li>
                            <li><a href="{{route('user.index')}}"><i class="icon-user"></i>User</a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-eye-open"></i>  Results</a>
                             
                            </li>
                         
                            
                            <li  class="dropdown"> 
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <img src="{{asset('a.png')}}" class="nav-avatar" style="float:right">
                                       
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                              
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->