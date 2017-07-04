<head>

    <title>Reciclapp - Centro de Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="a04gIM2pLD52IVwRn4cF2AQjU9zE98plx37IbLeH"/>

    {{-- Laravel Charts --}}
    {!! Charts::assets() !!}

    
    <!-- Fonts -->
    {!!Html::style('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|Lato:300,400,700,900')!!}

    <!-- CSS App -->
    {!!Html::style('../vendor/tcg/voyager/publishable/assets/css/style.css')!!}
    
    {!!Html::style('../vendor/tcg/voyager/publishable/assets/css/themes/flat-blue.css')!!}
    
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://cdn.cp.adobe.io/content/2/dcx/7b1530ce-d47f-485f-a6f7-41909efb47d8/content/appIcon.png/version/5">
    <!-- CSS Fonts -->
    {!!Html::style('../vendor/tcg/voyager/publishable/assets/fonts/voyager/styles.css')!!}
    
    {!!Html::script('../vendor/tcg/voyager/publishable/assets/lib/js/jquery.min.js')!!}
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    
    {!!Html::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js')!!}

    {!!Html::style('../vendor/tcg/voyager/publishable/assets/css/ga-embed.css')!!}
    <!-- Voyager CSS -->
    {!!Html::style('../vendor/tcg/voyager/publishable/assets/css/voyager.css')!!}
    <!-- Few Dynamic Styles -->

    {!!Html::style('../vendor/Modal-estilo/modal-estilo.css')!!}
     
    {!!Html::style('../vendor/EstiloReciclap/estiloReciclap.css')!!} 
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!} 
    {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')!!}
    {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')!!}
 
    <style type="text/css">
        .flat-blue .side-menu .navbar-header, .widget .btn-primary, .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:#1ABC9C;
            border-color:#1ABC9C;
        }
        .breadcrumb a{
            color:#22A7F0;
        }
    </style>
      <style type="text/css">
        th{
            font-weight: bold;
        }
        .page-header{
            margin: 0px 0px 20px;
            font-family: 'Roboto'; 
        }
        .fa{
            color: #FFFFFF;
        }
        label{
            font-family: 'Roboto'; 
        }
       .cortar{ 
            width:150px; 
            height:40px; 
            padding:20px; 
            text-overflow:ellipsis; 
            white-space:nowrap;  
            overflow:hidden; 
           
        } 
        .perfil-admin{
            background-size:cover; background: url(URL::to('/') . "/resources/wallpaper-reciclapp.jpg") center center;
            position:absolute; 
            top:0; 
            left:0; 
            width:100%; 
            height:300px;
        }
        .alert {
            padding: 8px 35px 8px 14px;
            margin-bottom: 18px;
            color: #c09853;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
            background-color: #fcf8e3;
            border: 1px solid #fbeed5;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .alert-heading {
            color: inherit;
        }

        .alert .close {
            position: relative;
            top: -2px;
            right: -21px;
            line-height: 18px;
        }
    </style> 

    
    
</head>

  