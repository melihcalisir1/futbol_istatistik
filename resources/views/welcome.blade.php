<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üstte Yatay Menü</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Navbar Tasarımı */
        .top-navbar {
            width: 100%;
            background-color: #333;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .top-navbar a {
            text-decoration: none;
            color: white;
            text-align: center;
            transition: all 0.3s ease-in-out;
            flex: 1;
        }

        .top-navbar a:hover {
            color: #f4a261;
        }

        .top-navbar svg {
            width: 24px;
            height: 24px;
            fill: white;
            margin-bottom: 5px;
            transition: fill 0.3s ease-in-out;
        }

        .top-navbar a:hover svg {
            fill: #f4a261;
        }

        .top-navbar b {
            font-size: 12px;
            display: block;
        }

        /* İçerik alanı */
        .content {
            margin-top: 60px;
            padding: 20px;
        }
    </style>
</head>
<body>
<!-- Üst Navbar -->
<div class="top-navbar">
    <a href="/fikstur">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M5 3h14v2H5zm0 4h10v2H5zm0 4h14v2H5zm0 4h10v2H5zm0 4h14v2H5z"/>
        </svg>
        <b>Fikstür</b>
    </a>
    <a href="/puan-durumu">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M3 3h18v2H3zm0 4h12v2H3zm0 4h18v2H3zm0 4h8v2H3z"/>
        </svg>
        <b>Puan Durumu</b>
    </a>
    <a href="/canli-maclar">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-2.63-.35-4.68-2.4-5.03-5.03H11v5.03zM11 13H6.07c.35-2.63 2.4-4.68 5.03-5.03V13zm0-7.07c-2.5.34-4.47 2.31-4.81 4.81H11V5.93zM13 11h4.81c-.34-2.5-2.31-4.47-4.81-4.81V11zm0 2v5.07c2.5-.34 4.47-2.31 4.81-4.81H13zm0-7.07V5.93h4.81c-.34 2.5-2.31-4.47-4.81-4.81z"/>
        </svg>
        <b>Canlı Maçlar</b>
    </a>
</div>

<!-- İçerik -->
<div class="content">
    <h1>Hoş Geldiniz</h1>
    <p>Bu bir yatay üst menü tasarımıdır. Fikstür, Puan Durumu ve Canlı Maçlar sayfalarına bağlantı verebilirsiniz.</p>
</div>
</body>
</html>
