<?php
$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Display",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Computer",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Accessories",
        "harga" => 250000,
        "stok" => 10
    ],
    [
        "nama" => "Mechanical Keyboard",
        "kategori" => "Accessories",
        "harga" => 1200000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 750000,
        "stok" => 5
    ],
    [
        "nama" => "Webcam Full HD",
        "kategori" => "Camera",
        "harga" => 450000,
        "stok" => 2
    ]
];

$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #EBF5FF;
            color: #2b2b2b;
            line-height: 1.6;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background-color: #FFFDF7;
            box-shadow: 0 2px 10px rgba(49, 70, 90, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #31465A;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #31465A;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: #89B9E6;
        }

        .hero {
            background-color: #31465A;
            color: #ffffff;
            margin: 2rem 5%;
            padding: 4rem 3rem;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(49, 70, 90, 0.15);
        }

        .hero p.tagline {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #89B9E6;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p.subtext {
            color: #D9F0FF;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .btn-primary {
            display: inline-block;
            background-color: #89B9E6;
            color: #31465A;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #72a5d6;
        }

        .container {
            padding: 0 5% 4rem 5%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2rem;
        }

        .section-header p.subtitle {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #31465A;
            font-weight: bold;
        }

        .section-header h2 {
            font-size: 1.8rem;
            color: #31465A;
        }

        .total-badge {
            background-color: #31465A;
            color: #FFFDF7;
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background-color: #FFFDF7;
            border-radius: 12px;
            border: 2px solid #89B9E6;
            padding: 1.5rem;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(49, 70, 90, 0.15);
        }

        .badge-discount {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #89B9E6;
            color: #31465A;
            font-size: 0.75rem;
            font-weight: bold;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
        }

        .category {
            font-size: 0.8rem;
            color: #31465A;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 0.25rem;
            opacity: 0.75;
        }

        .product-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #31465A;
        }

        .price-container {
            margin-bottom: 1rem;
            background-color: #D9F0FF;
            padding: 0.75rem;
            border-radius: 8px;
        }

        .old-price {
            text-decoration: line-through;
            color: #718096;
            font-size: 0.9rem;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #31465A;
        }

        .stock-info {
            font-size: 0.9rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .status-badge {
            display: inline-block;
            font-size: 0.8rem;
            font-weight: bold;
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        .status-available {
            background-color: #C7DFA3;
            color: #213609;
        }

        .status-out {
            background-color: #fbb3b3;
            color: #741d1d;
        }

        .buy-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #31465A;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .buy-button:hover {
            background-color: #1f2e3d;
        }

        .buy-button:disabled {
            background-color: #cbd5e0;
            cursor: not-allowed;
            color: #718096;
        }

        footer {
            text-align: center;
            padding: 2rem;
            background-color: #31465A;
            color: #D9F0FF;
            font-size: 0.9rem;
            font-weight: 500;
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            .hero {
                padding: 2rem 1.5rem;
            }
            .navbar {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">Cia Store</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#katalog">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <header class="hero">
        <p class="tagline">CIA STORE</p>
        <h1>Simple Tech Store.</h1>
        <p class="subtext">Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#katalog" class="btn-primary">Lihat Produk</a>
    </header>

    <main class="container" id="katalog">
        <div class="section-header">
            <div>
                <p class="subtitle">OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-badge">
                Total Produk: <?php echo $total_produk; ?>
            </div>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php 
                    $harga_normal = $product['harga'];
                    $has_discount = $harga_normal >= 1000000;
                    $harga_akhir = $has_discount ? $harga_normal * 0.9 : $harga_normal;
                ?>
                <article class="product-card">
                    <div>
                        <?php if ($has_discount): ?>
                            <span class="badge-discount">DISKON 10%</span>
                        <?php endif; ?>

                        <p class="category"><?php echo htmlspecialchars($product['kategori']); ?></p>
                        <h3 class="product-title"><?php echo htmlspecialchars($product['nama']); ?></h3>
                        
                        <div class="price-container">
                            <?php if ($has_discount): ?>
                                <p class="old-price">Rp<?php echo number_format($harga_normal, 0, ',', '.'); ?></p>
                                <p class="current-price">Rp<?php echo number_format($harga_akhir, 0, ',', '.'); ?></p>
                            <?php else: ?>
                                <p class="current-price">Rp<?php echo number_format($harga_normal, 0, ',', '.'); ?></p>
                            <?php endif; ?>
                        </div>

                        <p class="stock-info">Stok: <?php echo $product['stok']; ?></p>

                        <div>
                            <?php if ($product['stok'] > 0): ?>
                                <span class="status-badge status-available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-badge status-out">Stok Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <?php if ($product['stok'] > 0): ?>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="buy-button" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>