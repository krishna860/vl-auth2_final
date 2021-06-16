

<template>
    <router-view>
     <div id="nav">
        <router-link to="/HomeComponent">Home</router-link> |
        <router-link to="/homenav">Homee</router-link> |
        <router-link to="/productList">Productlist</router-link> |
        <router-link to="/viewdetails">Viewdetails</router-link> |
    </div>
  <router-view />
</template>

<script>
import login from './views/login'

export default{
    name: 'App',
    components:{
        login
    } 
        
    }

</script>

