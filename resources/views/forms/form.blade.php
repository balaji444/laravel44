@extends('layouts.app')

@section('header')   
<script src="public/js/jquery.validate.min.js"></script> 
<style>
.error {color:red;}
    @import "compass/css3";

    @import url(http://fonts.googleapis.com/css?family=Merriweather);
    $red: #e74c3c;

    html, body {
        background: #f1f1f1;
        font-family: 'Merriweather', sans-serif;
        padding: 1em;
    }

    form {
        max-width: 600px;
        text-align: center;
        margin: 20px auto;

        input, textarea {
            border:0; outline:0;
            padding: 1em;
            display: block;
            width: 100%;
            margin-top: 1em;
            font-family: 'Merriweather', sans-serif;
            resize: none;

        }

        #input-submit {
            color: white; 
            background: $red;
            cursor: pointer;

        }

        textarea {
            height: 126px;
        }
    }


    .half {
        float: left;
        width: 48%;
        margin-bottom: 1em;
    }

    .right { width: 50%; }

    .left {
        margin-right: 2%; 
    }


    @media (max-width: 480px) {
        .half {
            width: 100%; 
            float: none;
            margin-bottom: 0; 
        }
    }


    /* Clearfix */
    .cf:before,
    .cf:after {
        content: " "; /* 1 */
        display: table; /* 2 */
    }

    .cf:after {
        clear: both;
    }

</style>
<script type="text/javascript" language="javascript">
    $(document).ready(function () {
                       
$("#contact").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined      
      name: "required",     
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true,
        remote: '/larashop/emailunique',
      },
      subject: "required",
      message: "required",
          password: "required",
    cpassword: {
      equalTo: "#password"
    }

    },
    //errorElement : 'div',
    //errorElement: "span",
    errorPlacement: function(error, element) {
     error.insertAfter(element);
    },
    // Specify validation error messages
    messages: {
      name: "Please enter your name",
      subject: "Please enter subject",
      email: {
        required: "Please enter a valid email address",
        email: "Please enter a valid email address",
        remote: "This email is already taken! Try another."
      },
      message: "Please enter message",
      password: "Please enter password",
      cpassword: "Password should be match"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      //form.submit();
	    $.ajax({
           type: "POST",
           url: '/larashop/contacts',
           data: $("#contact").serialize(), // serializes the form's elements.
           success: function(response)
           {
               //alert(response); // show response from the php script.
		if(response == 'Success') 
		{
		$('#DisplayErrors').show().html('Contact was submitted successful!');
		} else {
		var parsedJson = jQuery.parseJSON(response);
		var errorString = '';
		$.each( parsedJson.errors, function( key, value) {
              		errorString += '<li>' + value + '</li>';
		});
		$('#DisplayErrors').show().html(errorString);
		}

           }
         });
    }
  });

    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
		<div id="DisplayErrors" style="display:none;"></div>
                    <form class="form-horizontal" role="form" method="POST" id="contact"  >
                        {{ csrf_field() }}

                        
                        <div class="half left cf">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" id="input-name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" id="input-email" name="email" placeholder="Email address" value="{{ old('email') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <input type="text" id="input-subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"/>
                            <input id="cpassword" type="password" name="cpassword" placeholder="Confirm Password"/>
                        </div>
                        <div class="half right cf">
                            <textarea name="message" type="text" id="input-message" name="message" placeholder="Message">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
       
