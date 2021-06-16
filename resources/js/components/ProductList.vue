<template>
  <html>
    <head>
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="undefined"
        crossorigin="anonymous"
      />
      <!-- <script type = "text/javascript"   
            src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  
      </script>   -->
    </head>

    <body>
      <div class="nav">
        <ul>
          <li>
            <a href="/homenav">
              <span class="icon"
                ><i class="fa fa-home" aria-hidden="true"></i
              ></span>
              <span class="title">Home</span>
            </a>
          </li>

          <li>
            <a href="/productList">
              <span class="icon"
                ><i class="fa fa-product-hunt" aria-hidden="true"></i
              ></span>
              <span class="title">Product</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="icon"
                ><i class="fa fa-circle" aria-hidden="true"></i
              ></span>
              <span class="title">About us</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="icon"
                ><i class="fa fa-address-card" aria-hidden="true"></i
              ></span>
              <span class="title">Contact us</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="icon"
                ><i class="fa fa-address-card" aria-hidden="true"></i
              ></span>
              <span class="title">Gallery</span>
            </a>
          </li>
        </ul>
      </div>

      <div
        class="
          w-100
          h-100
          d-flex
          flex-column
          justify-content-center
          align-items-center
        "
        style="margin-top: 30px"
      >
        <input
          class="input-group-sm"
          @keyup.enter="loadproducts"
          v-model="search"
          type="search"
          placeholder="Search Product Details Here.."
        />

        <h1>Product Detail Page</h1>
        <div class="w-50">
          <form @submit.prevent="SaveData">
            <div class="input-group mb-3 w-100">
              <table style="width: 100%">
                <tr>
                  <th>
                    <input
                      v-model="form.Name"
                      :class="{ 'is-invalid': form.errors.has('Name') }"
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Product Name"
                    />
                    <span
                      class="text-warning pt-3"
                      v-if="form.errors.has('Name')"
                      v-text="form.errors.get('Name')"
                    ></span>
                  </th>
                  <br /><br /><br />
                </tr>

                <tr>
                  <th>
                    <input
                      v-model="form.Quality"
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Product quality"
                    />
                    <span
                      class="text-warning pt-3"
                      v-if="form.errors.has('Quality')"
                      v-text="form.errors.get('Quality')"
                    ></span>
                  </th>
                  <br /><br /><br />
                </tr>

                <tr>
                  <th>
                    <input
                      v-model="form.Quantity"
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Product quantity"
                    />
                    <span
                      class="text-warning pt-3"
                      v-if="form.errors.has('Quantity')"
                      v-text="form.errors.get('Quantity')"
                    ></span>
                  </th>
                  <br /><br /><br />
                </tr>

                <tr>
                  <th>
                    <input
                      v-model="form.Price"
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Product price"
                    />
                    <span
                      class="text-warning pt-3"
                      v-if="form.errors.has('Price')"
                      v-text="form.errors.get('Price')"
                    ></span>
                  </th>
                  <br /><br /><br />
                </tr>

                <div class="input-group-append">
                  <th>
                    <center>
                      <button
                        style="width: 715%"
                        class="btn btn-danger"
                        type="submit"
                        id="button-addon2">
                        Add Product
                      </button>
                    </center>
                  </th>
                </div>
              </table>
            </div>
          </form>

          <table
            class="table table-striped table-hover table-reflow"
            style="margin-top: 50px"
          >
            <thead>
              <tr>
                <th class="col-xl-12"><strong>Name</strong></th>
                <th class="col-xl-12"><strong>Quality</strong></th>
                <th class="col-xl-12"><strong>Quantity</strong></th>
                <th class="col-xl-12"><strong>Price</strong></th>
                <th class="col-xl-12"><strong>Del/up</strong></th>
                <th class="col-xl-12"><strong>Details</strong></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products" :key="product.id">
                <td>
                  <strong>{{ product.Name }}</strong>
                </td>
                <td>
                  <strong>{{ product.Quality }}</strong>
                </td>
                <td>
                  <strong>{{ product.Quantity }}</strong>
                </td>
                <td>
                  <strong>{{ product.Price }}</strong>
                </td>


              
            <!-- <div v-for="product in products" :key="product.id" class="w-100 d-flex align-items-center p-3 bg-white border-bottom"> -->
                <span class="mr-2">
                <svg v-on:click="toggleProduct(product)" v-if="product.completed == false" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="12" cy="12" r="9" />
                </svg> 
                <svg v-if="product.completed == true" v-on:click="toggleProduct(product)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4CAF50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="12" cy="12" r="9" />
                    <path d="M9 12l2 2l4 -4" />
                </svg>
                </span>

            <div  class="font-weight-bolder">
              <span v-if="editmode == false || editmode != todo.id">{{product.name}}</span>
              <input v-if="editmode == product.id"   v-model="product.title" type="text">
            </div>


            <div class="ml-auto mr-2 d-flex align-items-center">
            <span>
    
                <svg v-on:click="editmode = product.id"  v-if="editmode != product.id" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"/>
                  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                  <line x1="16" y1="5" x2="19" y2="8" />
                </svg>

                <svg v-if="editmode == product.id" v-on:click="updateProduct(product)"  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4CAF50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"/>
                  <polyline points="9 11 12 14 20 6" />
                  <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                </svg>
            </span>
            <span>
                <svg v-on:click="deleteProduct(product)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash ml-1" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF5722" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"/>
                  <line x1="4" y1="7" x2="20" y2="7" />
                  <line x1="10" y1="11" x2="10" y2="17" />
                  <line x1="14" y1="11" x2="14" y2="17" />
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
            </span>
          </div>

               

                <td>
                  <a :href="'/api/viewdetails/' + product.id">view details</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
     

        <ul class="u">
          <li><a href="#" class="prev"> Prev </a></li>
          <li class="pagi active"><a href="#">1</a></li>
          <li class="pagi"><a href="#">2</a></li>
          <li class="pagi"><a href="#">3</a></li>
          <li><a href="#" class="prev"> Next </a></li>
        </ul>

        <!-- <script type="text/javascript">
        $(document).ready(function(){
        $('.next').click(function(){
            $('.u').find('.pagi.active').next().addClass('active');
            $('.u').find('.pagi.active').prev().removeClass('active');
        })

        $('.prev').click(function(){
            $('.u').find('.pagi.active').prev().addClass('active');
            $('.u').find('.pagi.active').next().removeClass('active');
        })
    
        })
        </script> -->
   
       </div>
    </body>
  </html>
</template>





<script>
import axios from "axios";
// import axios from 'axios';
export default {
  data() {
    return {
      editmode:false,
      products: "",
      search: "",
      form: new Form({
        Name: "",
        Quality: "",
        Quantity: "",
        Price: "",
      }),
    };
  },
  methods: {

       // update data
       updateProduct(e){
                this.editmode = false
                let data = new FormData();
                data.append('_method', 'PATCH')
                data.append("Name", this.form.Name);
                data.append("Quality", this.form.Quality);
                data.append("Quantity", this.form.Quantity);
                data.append("Price", this.form.Price);
                axios.post('/api/product/'+e.id, data).then(()=>{})
                .catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
    },


    //completed 
      toggleProduct(e){
                e.completed = !e.completed
                let data = new FormData();
                data.append('_method', 'PATCH')
                if(e.completed == true){
                    data.append('completed', 1);
                }
                if(e.completed == false){
                    data.append('completed', 0)
                }
                axios.post('/api/product/'+e.id, data)
            },

     //delete data
          deleteProduct(e){
                      let data = new FormData();
                      data.append('_method', 'DELETE')
                      axios.post('/api/product/'+e.id, data).then((res) =>{
                          this.products = res.data
                      }).catch((error) => {
                          this.form.errors.record(error.response.data.errors)
                      })
          },


    //search method
    loadproducts() {
      axios
        .get("/api/product?search=" + this.search)
        .then((res) => {
          this.products = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

   

 

    // get data
    getproducts() {
      axios
        .get("/api/product")
        .then((res) => {
          this.products = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    SaveData() {
      let data = new FormData();
      data.append("Name", this.form.Name);
      data.append("Quality", this.form.Quality);
      data.append("Quantity", this.form.Quantity);
      data.append("Price", this.form.Price);
      axios
        .post("/api/product", data)
        .then((res) => {
          this.form.reset();
          this.getproducts();
        })
        .catch((error) => {
          this.form.errors.record(error.response.data.errors);
        });
    },
  },
  mounted() {
    this.getproducts();
    this.loadproducts();
  },
};
</script>



<style>
@import url("http://fonts.cdnfonts.com/css/namesake-nf");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "poppins", sans-serif;
}
body {
  min-height: 100vh;
  background: #ce4c4c;
}
.nav {
  position: fixed;
  width: 60px;
  height: 100%;
  background-color: #970a0a;
  transition: 0.5s;
  overflow: hidden;
}

.nav:hover,
.nav.active {
  width: 300px;
}

.nav ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.nav ul li {
  position: relative;
  width: 100%;
  list-style: none;
}

.nav ul li:hover {
  background: #ea1d63;
}
.nav ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: #fff;
}

.nav ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 60px;
  text-align: center;
}

.nav ul li a .icon .fa {
  font-size: 24px;
}

.nav ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* this is search css */

.search {
  font-family: Arial, Helvetica, sans-serif;
  text-shadow: 2px 2px #ff0000;
  margin-top: 10%;
  margin-left: 25%;
}
.input-group-sm {
  width: 50%;
  padding-bottom: 5%;
  margin-top: 3%;
  height: 1%;
  background-color: darkgray;
  margin-bottom: 2%;
}

/* this is pagination css */
.u {
  position: relative;
  background: #fff;
  display: flex;
  padding: 10px 20px;
  border-radius: 50px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  height: 55px;
  margin-top: 20px;
}
.u li {
  list-style: none;
  line-height: 50px;
  margin: 0 5px;
}
.u li.pagi {
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
}
.u li a {
  display: block;
  text-decoration: none;
  color: #777;
  font-weight: 600;
  border-radius: 50%;
}
ul li.pagi:hover a,
ul li.pagi.active a {
  background: #333;
  color: #fff;
}

ul li:first-child {
  margin-right: 30px;
  font-weight: 700;
  font-size: 20px;
}
ul li:last-child {
  margin-left: 30px;
  font-weight: 700;
  font-size: 20px;
}
</style>




