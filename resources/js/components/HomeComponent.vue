<template>
    <html>
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">
        </head>
    <body>
    <div class="nav">
        <ul>
            <li>
                <a href="/homenav">    
                    <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                    <span class="title">Home</span>
                    
                </a>
            </li>

            <li>
                <a href="/productList">
                    <span class="icon"><i class="fa fa-product-hunt" aria-hidden="true"></i></span>
                    <span class="title">Product</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span>
                    <span class="title">About us</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                    <span class="title">Contact us</span>
                </a>
            </li>

             <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                    <span class="title">Gallery</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- <div class="toggle" onclick="toggleMenu()"></div> -->
    <!-- <script type="text/javascript">
        function toggleMenu(){
            Let nav = document.querySelector('.nav');
            Let toggle = document.querySelector('.toggle');
            nav.classList.toggle('active');
            toggle.classList.toggle('active');
        }
    </script> -->
    </body>
</html>
</template>


<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
}
body{
    min-height: 100vh;
    background: #150019;

}
.nav{
    position: fixed;
    width: 60px;
    height: 100%;
    background-color: #3e0748;
    transition: 0.5s;
    overflow: hidden;
}

.nav:hover,
.nav.active{
    width: 300px;

}

.nav ul{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.nav ul li{
    position: relative;
    width: 100%;
    list-style: none;
}

.nav ul li:hover{
    background: #ea1d63;
}
.nav ul li a{
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: #fff;
}

.nav ul li a .icon{
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
}

.nav ul li a .icon .fa{
    font-size: 24px;
}

.nav ul li a .title{
    position: relative;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 60px;
    text-align: start;
    white-space: nowrap;
}
















/* }
.toggle{
    position: absolute;
    top: 0;
    right: 0;
    width: 60px;
    height: 60px;
    background: #330748;
    cursor: pointer;
}
.toggle.active{
    background: #ea1d63;
}

.toggle:before{
    content:'\f0c9';
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    position: absolute;
    width:100%;
    height: 100%;
    line-height: 60px;
    text-align: center;
    font-size: 24px;
    color: #000000;
}

.toggle.active:before{
     content:'\f00d';
} */

</style>