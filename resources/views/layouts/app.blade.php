<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'نظام مهام الموظفين')</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; }
        .site-header { background: #0f172a; color: white; padding: 15px 25px;}
        .container { max-width: 800px; margin: 20px auto; background: while; padding: 20px; border-radius: 10px; }
        .alert-success { background: #dcfce7; color: #166534; padding: 10px; border-radius: 6px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: right; border-bottom: 1px solid #e2e8f0; }
        .badge { padding: 3px 10px; border-radius: 12px; font-size: 12px; }
        .badge-pending { background: #fef9c3; color: #854d0e; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
        .badge-done { background: #dcfce7; color: #166534; }
    </style>
</head>    
<body>
    <header class="site-header">
        <h1>نظام إدارة مهام الموظفين</h1>
    </header>
     <div class="container">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
     </div>

</body>
</html>