<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Livewire DataTable Example - Tutsmake.com</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
     @livewireStyles
    </head>
<body class="bg-gradient-to-r from-slate-50  to-slate-200">
    <h1 class="text-4xl text-indigo-300 text-center ">Testing tailwind style sheets</h1>
<div class="container">
    
    <div class="text-center">
      <h2 class="text-slate-600 text-lg ml-6">Laravel 9 Livewire DataTable Example - Tutsmake.com</h2>
        
    
      <div class="mt-10 ml-10 text-center shadow-xl">
        <livewire:user-datatables 
            searchable="name, email"
            exportable
         />
  
      </div>
    </div>
        
</div>
    
</body>
  
@livewireScripts
  
</html>