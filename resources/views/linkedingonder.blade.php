<!doctype html>

<html>
<head>
  

  <title>linkedin form</title>
  <link rel="stylesheet" href="/css/app.css">

</head>

<body>
 <div class="container">
     <div class="panel panel-default">  
         <div class="panel-heading">
            Metin gönderim

         </div>

         <div class="panel-body">
            <form class=form-horizontal role="form" method="POST" action="{{ url('/postgonder') }}">
            
                <input type="text" name="posticerik"> 
                <input type="submit" name="gonder"> 
                @csrf <!-- {{ csrf_field() }} -->
            </form>
        </div>
     </div>
 </div>
</body>
</html>