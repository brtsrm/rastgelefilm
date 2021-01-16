<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="tr"  class="no-js">
<head>
    <!-- Basic need -->
    <title>@yield("title","Rastgele Film")</title>
    <meta charset="UTF-8">
    <meta name="description" content="@yield("description","Rastgele film...")">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone-no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSS files -->
    
    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <link rel="stylesshet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>

<body>