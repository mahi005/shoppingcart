<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery | Cart</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php  require 'partials/_nav.php' ?>
    <div class="container">

        <main>

            <section class="theme-sec">
                <h1>Cart</h1>
             
                <div class="cart">
                    
                        <div class="items"></div>

                        <div class="total bold">
                            Total: <span id="total-price"></span>
                            <a href="purchase.php" class="purchase">Purchase</a>
                        </div>
             
                </div>

            </section>
        </main>

        <footer>
            <h3>New Bakery &copy; All rights reserved.</h3>
        </footer>
    </div>
    

    <script>

        function limiter(n) {
            if (n.value < 1) n.value = 1;
            if (n.value > 9) n.value = 9;
        }

        function totalPrice() {
            let items = document.querySelectorAll('.item')
            let totalPrice = 0

            items.forEach( item => {
                totalPrice += item.childNodes[5].innerText.slice(1, item.childNodes[5].innerText.length) * item.childNodes[7].value
            })

            document.querySelector('#total-price').innerText = "$" + totalPrice
        }

        function dltItem(btn) {
            let item = btn.parentElement.parentElement
            let name = item.childNodes[3].innerText
            let products = JSON.parse(localStorage.getItem('cart_products'))

            let itemNo = products.indexOf(products.find(el => el.name == name))

            products.splice(itemNo, 1)
            localStorage.setItem("cart_products", JSON.stringify(products))

            item.remove()
            totalPrice()
        }

        function updateUI(name, img, price) {

            let container = document.querySelector('.items')

            container.innerHTML = container.innerHTML + `<div class="item">
                <img src="${img}" alt="img">
                <h3>${name}</h3>
                <div>${price}</div>
                <input type="number" value="1" onchange="totalPrice(); limiter(this)">
                <div><img src="./src/icon/delete.svg" onclick="dltItem(this)" alt="Remove"></div>
            </div>`

        }

        function setCart() {

            let products = JSON.parse(localStorage.getItem('cart_products'))

            products.forEach( item => updateUI(item.name, item.img, item.price))

            totalPrice()
        }

        setCart()
    </script>
</body>
</html>