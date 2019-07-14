<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Laravel App">
    <meta name="author" content="Utpal Sarkar">
    <meta name="keyword" content="Laravel,App">
    <title>Laravel</title>
    <!-- Icons-->
    <link href="{{ asset("vendors/@coreui/icons/css/coreui-icons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/flag-icon-css/css/flag-icon.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/simple-line-icons/css/simple-line-icons.css") }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/pace-progress/css/pace.min.css") }}" rel="stylesheet">
    @if(Route::is("products.create") || Route::is("products.edit") || Route::is("users.create") || Route::is("users.edit") || Route::is("shops.create") || Route::is("shops.edit"))
        <style>
            .avatar-upload {
                position: relative;
                max-width: 205px;
            }
            .avatar-upload .avatar-edit {
                position: absolute;
                right: 12px;
                z-index: 1;
                top: 10px;
            }
            .avatar-upload .avatar-edit input {
                display: none;
            }
            .avatar-upload .avatar-edit input + label {
                display: inline-block;
                width: 34px;
                height: 34px;
                margin-bottom: 0;
                border-radius: 100%;
                background: #FFFFFF;
                border: 1px solid #006fff;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                cursor: pointer;
                font-weight: normal;
                transition: all 0.2s ease-in-out;
            }
            .avatar-upload .avatar-edit input + label:hover {
                background: #f1f1f1;
                border-color: #d6d6d6;
            }
            .avatar-upload .avatar-edit input + label:after {
                content: "\f03e";
                font-family: "FontAwesome";
                text-rendering: auto;
                color: #006fff;
                position: absolute;
                top: 6px;
                left: 0;
                right: 0;
                text-align: center;
                margin: auto;
            }
            .avatar-upload .avatar-preview {
                width: 192px;
                height: 192px;
                position: relative;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            }
            .avatar-upload .avatar-preview > div {
                width: 100%;
                height: 100%;
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
            }
        </style>
    @endif
</head>
@yield('content')
</html>
