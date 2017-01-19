@extends('layouts.app')
<head>
<link rel="stylesheet" type="text/css" href="public/css/app.css">
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<script type = "text/javascript" language = "javascript">
    $(document).ready(function () {
         
         $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.articles').html(data);  
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }

         
//    $.ajax({
//           type: "GET",
//           url: '/larashop/contactsajaxlist',
//           data: 'data=abc',
//           success: function(data)
//           {
//               
//               $("#ajaxlist").html();
//               $("#ajaxlist").html(data);
//           }
//         }); 
    });
</script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
@if (count($contacts) > 0)
                    <section class="articles">
                        @include('forms.contactsajaxlist')
                    </section>
                @endif
<!--<div id="ajaxlist"></div>-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
