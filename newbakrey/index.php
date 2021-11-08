
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bakery | Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php  require 'partials/_nav.php' ?>
    <div class="container">

        <main>

            <section class="show-img">
                <div>Check Out</div>
                <div>Today's Offer</div>
                <div>Shop Now !</div>
            </section>

            <section class="theme-sec">
                <h1>Products</h1>

                <div class="product-container">

                    <div class="product">
                        <h3>Bun pastery</h3>
                        <img src="./src/bun pastery.jpg" alt="Bread">
                        <div>
                            <span>$1.99</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <h3>Hot Fresh Bun</h3>
                        <img src="./src/hot fresh buns.jpg" alt="Bread">
                        <div>
                            <span>$ 3</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product">
                        <h3> Baked Bread</h3>
                        <img src="./src/baked bread.jpg" alt="Bread">
                        <div>
                            <span>$1</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <h3> Pistachio Cookies</h3>
                        <img src="./src/pistachio cookies.jpg" alt="Bread">
                        <div>
                            <span>$2</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <h3> Orange Muffins</h3>
                        <img src="./src/orange muffins.jpg" alt="Bread">
                        <div>
                            <span>$1</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product">
                        <h3> Fresh Raw Cinamon Rolls</h3>
                        <img src="./src/Fresh raw cinamon rolls.jpg" alt="Bread">
                        <div>
                            <span>$2</span>
                            <button onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>



                </div>

            </section>
        </main>

        <footer>
            <h3>New Bakery &copy; All rights reserved.</h3>
        </footer>
    </div>


    <script>

        function addToCart(btn) {
            let product = btn.parentElement.parentElement
            let name = product.childNodes[1].innerText
            

            let products = JSON.parse(localStorage.getItem('cart_products'))

            if(products.length != 0) {

                let itemNo = products.indexOf(products.find(el => el.name == name))
                    
                    if(itemNo != -1) {
                        products.splice(itemNo, 1)
                        btn.innerText = "Add to Cart"
                        localStorage.setItem("cart_products", JSON.stringify(products))
                    } else {
                        let img = product.childNodes[3].src
                        let price = product.childNodes[5].childNodes[1].innerText
                        let item = {
                            name: name,
                            img: img,
                            price: price
                        }

                        products.push(item)
                        btn.innerText = "Cancel"
                        localStorage.setItem("cart_products", JSON.stringify(products))
                    }
                
            } else {
                let img = product.childNodes[3].src
                let price = product.childNodes[5].childNodes[1].innerText
                let item = {
                    name: name,
                    img: img,
                    price: price
                }

                products.push(item)
                btn.innerText = "Cancel"
                localStorage.setItem("cart_products", JSON.stringify(products))
            }
        }

        function initiate() {
            if(localStorage.getItem("cart_products") == null) {
                localStorage.setItem("cart_products", JSON.stringify([]))
            } 
            
            let divs = document.querySelectorAll('.product')
            let products = JSON.parse(localStorage.getItem('cart_products'))

            for(let i=0 ; i<divs.length ; i++) {
                if(products.find(el => el.name == divs[i].childNodes[1].innerText) != undefined) {
                    divs[i].childNodes[5].childNodes[3].innerText = "Cancel"
                }
            }
        }

        initiate()
    </script>
    
</body>
</html>