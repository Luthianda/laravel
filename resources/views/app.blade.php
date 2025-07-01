<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title ?? ''}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('inc.css');
</head>

<body>

  <!-- ======= Header ======= -->
@include('inc.header');

  <!-- ======= Sidebar ======= -->
@include('inc.sidebar');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="content">
        @yield('content')
    </div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
@include('inc.footer');


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('inc.js');
    <script>
        const button = document.querySelector('.addRow');
        const tbody = document.querySelector('#myTable tbody');
        const select = document.querySelector('#id_service');

        const grandTotal = document.getElementById('grandTotal');
        const grandTotalInput = document.getElementById('grandTotalInput');

        let no = 1;
        button.addEventListener('click', function () {
            const selectedProduct = select.options[select.selectedIndex];
            const productValue = selectedProduct.value;
            if (!productValue) {
                alert('required selected product');
                return;
            }
            const productName = selectedProduct.textContent;
            const productPrice = selectedProduct.dataset.price;


            const tr = document.createElement('tr');
            // jika pakai (`) nyetaknya pakai ${}
            tr.innerHTML = `
                <td>${no}</td>
                <td><input type='hidden' name='id_product[]' class='id_products' value='${select.value}'>${productName}</td>
                <td>
                    <input type='number' min="1" name='qty[]' value='1' class='qtys'>
                    <input type='hidden' name='price[]' class='priceInput' value='${productPrice}'>
                </td>
                <td><input type='hidden' name='total[]' class='totals' value='${productPrice}'><span class='totalText'>${productPrice}</span></td>
                <td>
                    <button class='btn btn-danger btn-sm removeRow' type='button'>Delete</button>
                </td>
                `;

            tbody.appendChild(tr);
            no++;
            updateGrandTotal();
            select.value = "";


        });

        tbody.addEventListener("click", function (e) {
            if (e.target.classList.contains('removeRow')) {
                e.target.closest("tr").remove();
            }

            updateNumber();
            updateGrandTotal();
        });

        tbody.addEventListener('input', function (e) {
            if (e.target.classList.contains('qtys')) {
                const row = e.target.closest("tr");
                const qty = parseInt(e.target.value) || 0;
                const price = parseInt(row.querySelector('.priceInput').value);

                row.querySelector('.totalText').textContent = price * qty;
                row.querySelector('.totals').value = price * qty;
                updateGrandTotal();
            }
        });

        function updateNumber() {
            const rows = tbody.querySelectorAll("tr");

            rows.forEach(function (row, index) {
                row.cells[0].textContent = index + 1;
            });

            no = rows.length + 1;
        }

        function updateGrandTotal() {
            const totalCells = tbody.querySelectorAll('.totals');
            let grand = 0;
            totalCells.forEach(function (input) {
                grand += parseInt(input.value) || 0;
            });
            grandTotal.textContent = grand.toLocaleString('id-ID');
            grandTotalInput.value = grand;
        }
    </script>

</body>

</html>
