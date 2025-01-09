<!DOCTYPE html>
<html>
<head>
    <title>Dynamic PDF</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Page layout */
        @page {
            margin: 100px 50px; /* Top and bottom margins for header and footer */
        }

        header, footer {
            position: fixed;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }

        header {
            top: -70px;
        }

        footer {
            bottom: -70px;
        }

        footer .page-number:before {
            content: counter(page);
        }

        footer .total-pages:before {
            content: counter(pages);
        }

        /* Content page break */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <!-- Hidden Header and Footer -->
    <header>
        Document Header (from Page 3 onward)
    </header>
    <footer>
        Page <span class="page-number"></span> of <span class="total-pages"></span>
    </footer>

    <!-- Cover Page (Page 1) -->
    <div>
        <h1>Cover Page</h1>
        <p>This is the cover page content.</p>
    </div>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Content for Page 2 -->
    <div>
        <h1>Page 2 Content</h1>
        <p>This is the content of the second page. Header and footer are not visible here.</p>
    </div>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Content for Page 3 -->
    <div>
        <h1>Page 3 Content</h1>
        <p>This is the content of the third page. Header and footer are now visible.</p>
    </div>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Content for Page 4 -->
    <div>
        <h1>Page 4 Content</h1>
        <p>This is the content of the fourth page. Header and footer are still visible.</p>
    </div>
</body>
</html>
