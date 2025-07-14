<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laundry - POS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            text-align: center;
            color: #4a5568;
            margin-bottom: 10px;
            font-size: 2.5em;
            font-weight: 700;
        }

        .header .subtitle {
            text-align: center;
            color: #718096;
            font-size: 1.1em;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card h2 {
            color: #4a5568;
            margin-bottom: 20px;
            font-size: 1.8em;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #4a5568;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 101, 101, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(237, 137, 54, 0.3);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .service-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .service-card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .service-card .price {
            font-size: 1.5em;
            font-weight: 700;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .cart-table th {
            background: #f7fafc;
            font-weight: 600;
            color: #4a5568;
        }

        .cart-table tr:hover {
            background: #f7fafc;
        }

        .total-section {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .total-section h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .total-amount {
            font-size: 2.5em;
            font-weight: 700;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fed7d7;
            color: #c53030;
        }

        .status-process {
            background: #feebc8;
            color: #dd6b20;
        }

        .status-ready {
            background: #c6f6d5;
            color: #2f855a;
        }

        .status-delivered {
            background: #bee3f8;
            color: #2b6cb0;
        }

        .transaction-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .transaction-item {
            background: #f7fafc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 4px solid #667eea;
        }

        .transaction-item h4 {
            color: #4a5568;
            margin-bottom: 5px;
        }

        .transaction-item p {
            color: #718096;
            margin-bottom: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #000;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 2em;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }

        .receipt {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', monospace;
        }

        .receipt-header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .receipt-total {
            border-top: 2px solid #333;
            padding-top: 10px;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🧺 Sistem Informasi Laundry</h1>
            <p class="subtitle">Point of Sales System - Kelola Transaksi Laundry dengan Mudah</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3 id="totalTransactions">0</h3>
                <p>Total Transaksi</p>
            </div>
            <div class="stat-card">
                <h3 id="totalRevenue">Rp 0</h3>
                <p>Total Pendapatan</p>
            </div>
            <div class="stat-card">
                <h3 id="activeOrders">0</h3>
                <p>Dalam Proses</p>
            </div>
            <div class="stat-card">
                <h3 id="completedOrders">0</h3>
                <p>Pesanan Selesai</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Left Panel: New Transaction -->
            <div class="card">
                <h2>🛒 Transaksi Baru</h2>

                <form id="transactionForm" action="{{route('trans.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="customerName">Nama Pelanggan</label>
                        {{-- <input type="text" id="customerName" required> --}}
                        <select class="form-control" name="id_customer">
                            <option value="">Pilih Pelanggan</option>
                                @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="" class="form-label">No Pesanan</label>
                            <input type="text" class="form-control" name="order_code" readonly value="{{$orderCode ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="customerPhone">No. Telepon</label>
                            <div hidden="{{$customer->id}}"></div>
                            <input type="tel" name="phone" readonly value="{{$customer->phone}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pilih Layanan</label>
                        <div class="services-grid">
                            @foreach ($services as $service)
                            <button type="button" class="service-card" onclick="addService()">
                                    <h3 value="{{$service->id}}">👔 {{$service->service_name}}</h3>
                                    <div class="price" value="{{$service->id}}">{{"Rp. " . $service->price . "/kg"}}</div>
                            </button>
                            @endforeach
                            {{-- <button type="button" class="service-card" onclick="addService('Cuci Setrika', 7000)">
                                <h3>👔 Cuci Setrika</h3>
                                <div class="price">Rp 7.000/kg</div>
                            </button>
                            <button type="button" class="service-card" onclick="addService('Setrika Saja', 3000)">
                                <h3>🔥 Setrika Saja</h3>
                                <div class="price">Rp 3.000/kg</div>
                            </button>
                            <button type="button" class="service-card" onclick="addService('Dry Clean', 15000)">
                                <h3>✨ Dry Clean</h3>
                                <div class="price">Rp 15.000/kg</div>
                            </button>
                            <button type="button" class="service-card" onclick="addService('Cuci Sepatu', 25000)">
                                <h3>👟 Cuci Sepatu</h3>
                                <div class="price">Rp 25.000/pasang</div>
                            </button>
                            <button type="button" class="service-card" onclick="addService('Cuci Karpet', 20000)">
                                <h3>🏠 Cuci Karpet</h3>
                                <div class="price">Rp 20.000/m²</div>
                            </button> --}}
                        </div>
                    </div>

                    <div class="form-row">
                        {{-- <div class="form-group">
                            <label for="serviceWeight">Berat/Jumlah</label>
                            <input type="number" id="serviceWeight" step="0.1" min="0.1" required>
                        </div> --}}
                        <div class="form-group">
                            <label for="serviceType">Jenis Layanan</label>
                            {{-- <select id="serviceType" required>
                                <option value="">Pilih Layanan</option>
                                <option value="Cuci Kering">Cuci Kering</option>
                                <option value="Cuci Setrika">Cuci Setrika</option>
                                <option value="Setrika Saja">Setrika Saja</option>
                                <option value="Dry Clean">Dry Clean</option>
                                <option value="Cuci Sepatu">Cuci Sepatu</option>
                                <option value="Cuci Karpet">Cuci Karpet</option>
                            </select> --}}
                            <select class="form-control" id="id_service" name="id_service">
                                <option value="">Pilih Servis</option>
                                    @foreach ($services as $service)
                                        <option data-price="{{$service->price}}" value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notes">Catatan</label>
                        <textarea id="notes" rows="3" placeholder="Catatan khusus untuk pesanan..."></textarea>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="addToCart()" style="width: 100%; margin-bottom: 10px;">
                        ➕ Tambah ke Keranjang
                    </button>
                </form>

                <!-- Cart -->
                <div id="cartSection" style="display: none;">
                    <h3>📋 Keranjang Belanja</h3>
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Layanan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">
                        </tbody>
                    </table>

                    <div class="total-section">
                        <h3>Total Pembayaran</h3>
                        <div class="total-amount" id="totalAmount">Rp 0</div>
                        <button class="btn btn-success" onclick="processTransaction()" style="width: 100%; margin-top: 15px;">
                            💳 Proses Transaksi
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Panel: Transaction History -->
            <div class="card">
                <h2>📊 Keranjang</h2>
                <div class="transaction-list" id="transactionHistory">
                    {{-- <div class="transaction-item">
                        <h4>TRX-001 - John Doe</h4>
                        <p>📞 0812-3456-7890</p>
                        <p>🛍️ Cuci Setrika - 2.5kg</p>
                        <p>💰 Rp 17.500</p>
                        <p>📅 13 Juli 2025, 14:30</p>
                        <span class="status-badge status-process">Proses</span>
                    </div> --}}
                    <div class="transaction-item">
                        <h4 value="{{$orderCode && $customer->id}}">{{$orderCode . " : " . $customer->name}}</h4>
                        <p>📞 0813-7654-3210</p>
                        <p value="{{$service->id}}">🛍️ {{$service->service_name}}</p>
                        <p value="{{$service->id}}">💰 {{"Rp. " . $service->price}}</p>
                        <p value="{{$service->id}}">📅 {{$service->order_end_date}} </p>
                        <span class="status-badge status-ready">Siap</span>
                    </div>
                </div>

                <button class="btn btn-warning" onclick="showAllTransactions()" style="width: 100%; margin-top: 15px;">
                    📋 Lihat Semua Transaksi
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div style="text-align: center; margin-top: 20px;">
            <button class="btn btn-primary" onclick="showReports()" style="margin: 0 10px;">
                📈 Laporan Penjualan
            </button>
            <button class="btn btn-warning" onclick="manageServices()" style="margin: 0 10px;">
                ⚙️ Kelola Layanan
            </button>
            <button class="btn btn-danger" onclick="clearCart()" style="margin: 0 10px;">
                🗑️ Bersihkan Keranjang
            </button>
        </div>
    </div>

    <!-- Modal for Transaction Details -->
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
    let cart = [];
    let transactions = JSON.parse(localStorage.getItem('laundryTransactions')) || [];
    let transactionCounter = transactions.length + 1;

    // Fetch services from the database
    function fetchServices() {
        fetch('api.php?action=getServices')
            .then(response => response.json())
            .then(data => {
                const serviceSelect = document.getElementById('id_service');
                data.forEach(service => {
                    const option = document.createElement('option');
                    option.value = service.id; // Use service ID
                    option.setAttribute('data-price', service.price); // Store price in data attribute
                    option.textContent = `${service.service_name} - Rp ${service.price}`;
                    serviceSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching services:', error));
    }

    function addToCart() {
        const serviceSelect = document.getElementById('id_service');
        const serviceType = serviceSelect.options[serviceSelect.selectedIndex].text;
        const weightValue = document.getElementById('serviceWeight').value;
        const weight = parseDecimal(weightValue);
        const notes = document.getElementById('notes').value;

        if (!serviceType || !weightValue || weight <= 0) {
            alert('Mohon lengkapi semua field yang diperlukan!');
            return;
        }

        const price = parseInt(serviceSelect.options[serviceSelect.selectedIndex].getAttribute('data-price'));
        const subtotal = price * weight;

        const item = {
            id: Date.now(),
            service: serviceType,
            weight: weight,
            price: price,
            subtotal: subtotal,
            notes: notes
        };

        cart.push(item);
        updateCartDisplay();

        // Clear form
        document.getElementById('serviceWeight').value = '';
        document.getElementById('notes').value = '';
    }

    function processTransaction() {
        const customerSelect = document.querySelector('select[name="id_customer"]');
        const customerId = customerSelect.value;

        if (!customerId || cart.length === 0) {
            alert('Mohon lengkapi data pelanggan dan pastikan ada item di keranjang!');
            return;
        }

        const total = cart.reduce((sum, item) => sum + item.subtotal, 0);

        const transaction = {
            customer: {
                id: customerId // Send customer ID
            },
            items: cart,
            total: total
        };

        // Send transaction data to the server
        fetch('api.php?action=addTransaction', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(transaction)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Transaksi berhasil! ID: ' + data.transactionId);
                clearCart();
                updateTransactionHistory();
                updateStats();
            } else {
                alert('Transaksi gagal: ' + data.error);
            }
        })
        .catch(error => console.error('Error processing transaction:', error));
    }

    // Call fetchServices on page load
    window.onload = fetchServices;

    // Other functions remain unchanged...
</script>
